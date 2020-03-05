<?php


namespace Plugin\GmoEpsilon\Controller;

use Eccube\Application;
use Eccube\Common\Constant;
use Plugin\GmoEpsilon\Util\PaymentUtil;
use Plugin\GmoEpsilon\Util\PluginUtil;
use Guzzle\Service\Client;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

class PaymentController
{
    private $app;

    /**
     * @var string 非会員用セッションキー
     */
    private $sessionKey = 'eccube.front.shopping.nonmember';

    public function index(\Eccube\Application $app)
    {
        $this->app = $app;

        $Order = $this->app['eccube.repository.order']->findOneBy(array('pre_order_id' => $this->app['eccube.service.cart']->getPreOrderId()));
        if (empty($Order)) {
            $this->app['monolog.gmoepsilon']->addInfo('pay process error. not found Order in index.');
            $error_title = 'システムエラーが発生しました。';
            $error_message = '注文情報の取得が出来ませんでした。この手続きは無効となりました。';
            return $this->app['view']->render('error.twig', compact('error_title', 'error_message'));
        }
        
        // 商品公開ステータスチェック、商品制限数チェック、在庫チェック
        if (!$this->app['eccube.service.shopping']->isOrderProduct($this->app['orm.em'], $Order)) {
            $this->app->addError('front.shopping.stock.error');
            return $this->app->redirect($this->app->url('shopping_error'));
        }

        $PaymentExtension = $this->app['eccube.plugin.epsilon.repository.payment_extension']->find($Order->getPayment()->getId());

        // 決済方法に応じたServiceを取得
        $GmoEpsilonService = $this->getGmoEpsilonService($PaymentExtension->getPaymentTypeId());
        /*
         * 決済処理
         * 1.リクエストパラメータ設定
         * 2.POSTデータ送信
         * 3.イプシロン決済画面に遷移(コンビニ除く)
         */
        $this->app['monolog.gmoepsilon']->addInfo('pay process start. order_id = ' . $Order->getId());
        return $GmoEpsilonService->payProcess($Order, $PaymentExtension);
    }

    public function back(\Eccube\Application $app)
    {
        $this->app = $app;

        // 受注番号を取得
        $orderId = $this->app['request']->get('order_number');
        $Order = $this->app['eccube.repository.order']->find($orderId);
        if (empty($Order)) {
            $this->app['monolog.gmoepsilon']->addInfo('pay process error. not found Order in index.');
            $error_title = 'システムエラーが発生しました。';
            $error_message = '注文情報の取得が出来ませんでした。この手続きは無効となりました。';
            return $this->app['view']->render('error.twig', compact('error_title', 'error_message'));
        }

        $Customer = $Order->getCustomer();
        // 非会員の場合
        if (is_null($Customer)) {
            $Customer = $this->app['eccube.service.shopping']->getNonMember($this->sessionKey);
        }

        // 新しい受注を作成(受注IDを振りなおすため)
        $NewOrder = $this->app['eccube.service.shopping']->createOrder($Customer);
        $NewOrder->setPayment($Order->getPayment());
        $NewOrder->setPaymentMethod($Order->getPaymentMethod());
        $NewOrder->setCharge($Order->getCharge());

        $NewOrder = $this->app['eccube.service.shopping']->getAmount($NewOrder);

        /**
         * 新しい受注に紐づけられている届け先等を前の受注と紐づける
         * 新しい受注には前の受注に紐づけられた届け先等を紐づける
         * ※商品詳細は同じなので何もしない
         */
        $NewShippings = $NewOrder->getShippings();
        foreach ($NewShippings as $NewShipping) {
            $NewShipmentItems = $NewShipping->getShipmentItems();
            foreach ($NewShipmentItems as $NewShipmentItem) {
                $NewShipmentItem->setOrder($Order);
                $this->app['orm.em']->persist($NewShipmentItem);
            }
            $NewShipping->setOrder($Order);
            $NewOrder->removeShipping($NewShipping);
        }

        $Shippings = $Order->getShippings();
        foreach ($Shippings as $Shipping) {
            $ShipmentItems = $Shipping->getShipmentItems();
            foreach ($ShipmentItems as $ShipmentItem) {
                $ShipmentItem->setOrder($NewOrder);
                $this->app['orm.em']->persist($ShipmentItem);
            }
            $Shipping->setOrder($NewOrder);
            $this->app['orm.em']->persist($Shipping);
        }
        $NewOrder->setMessage($Order->getMessage());

        // 以前の受注情報を更新
        $Order->setOrderStatus($this->app['eccube.repository.order_status']->find($this->app['config']['order_processing']));

        $this->app['orm.em']->persist($Order);
        $this->app['orm.em']->persist($NewOrder);
        $this->app['orm.em']->flush();

        // 受注番号をリセット
        $this->app['session']->set('eccube.plugin.epsilon.orderId', null);

        $this->app['monolog.gmoepsilon']->addInfo('back. order_id = ' . $Order->getId() . ' new_order_id = ' . $NewOrder->getId());
        return $this->app->redirect($this->app->url('shopping'));
    }

    public function complete(\Eccube\Application $app)
    {
        $this->app = $app;

        // 想定外のリクエスト
        if ('POST' === $this->app['request']->getMethod()) {
            $this->app['monolog.gmoepsilon']->addInfo('pay process error. get Fraud POST.');
            $error_title = 'システムエラーが発生しました。';
            $error_message = '不正なPOSTリクエストを受信しました。';
            return $this->app['view']->render('error.twig', compact('error_title', 'error_message'));
        }

        // 受注番号を取得
        $orderId = $this->app['request']->get('order_number');
        if (empty($orderId)) {
            $orderId = $this->app['session']->get('eccube.plugin.epsilon.orderId');
        }

        if (empty($orderId)) {
            $Order = null;
        } else {
        	$Order = $this->app['eccube.repository.order']->find($orderId);
        }

        // 受注取得エラー
        if (empty($Order)) {
            // メールリンク決済の場合を考慮してオーダー情報確認CGIから受注番号を取得
            $arrXML = $this->getOrderInfo($_GET['trans_code']);
            $err_code = $this->app['eccube.plugin.epsilon.service.base']->getXMLValue($arrXML, 'RESULT', 'ERR_CODE');
            if (empty($err_code)) {
                $orderId = $this->app['eccube.plugin.epsilon.service.base']->getXMLValue($arrXML, 'RESULT', 'ORDER_NUMBER');
                $Order = $this->app['eccube.repository.order']->find($orderId);
            }

            if (empty($Order)) {
                $this->app['monolog.gmoepsilon']->addInfo('pay process error. not found Order in complete.');
                $error_title = 'システムエラーが発生しました。';
                $error_message = '注文情報の取得が出来ませんでした。この手続きは無効となりました。';
                return $this->app['view']->render('error.twig', compact('error_title', 'error_message'));
            }
        }

        $PaymentExtension = $this->app['eccube.plugin.epsilon.repository.payment_extension']->find($Order->getPayment()->getId());
        $paymentTypeId = $PaymentExtension->getPaymentTypeId();
        if ($paymentTypeId == $this->app['config']['GmoEpsilon']['const']['PAY_ID_MAIL']) {
            $arrXML = $this->getOrderInfo($_GET['trans_code']);

            // エラーチェック
            $err_code = $this->app['eccube.plugin.epsilon.service.base']->getXMLValue($arrXML, 'RESULT', 'ERR_CODE');
            if (empty($err_code)) {
                $payment_code = $this->app['eccube.plugin.epsilon.service.base']->getXMLValue($arrXML, 'RESULT', 'PAYMENT_CODE');
            }
            $response = array('payment_type_id' => $payment_code,
                              'trans_code' => $_GET['trans_code']);
        } else {
            $response = $_GET;
        }
        // 決済方法に応じたインスタンスを取得
        $GmoEpsilonService = $this->getGmoEpsilonService($PaymentExtension->getPaymentTypeId());

        $this->app['monolog.gmoepsilon']->addInfo('pay process end. order_id = ' . $Order->getId());

        return $GmoEpsilonService->compProcess($Order, $response);
    }

    /**
     * 各決済に応じたServiceを取得
     *
     * @param integer $epsilonPaymentId
     * @return Service
     */
    function getGmoEpsilonService($epsilonPaymentId)
    {
        switch ($epsilonPaymentId) {
            // クレジットカード決済
            case 1:
                $GmoEpsilonService = $this->app['eccube.plugin.epsilon.service.credit'];
                break;
            // 登録済みのクレジットカードで決済
            case 2:
                $GmoEpsilonService = $this->app['eccube.plugin.epsilon.service.reg_credit'];
                break;
            // コンビニ決済
            case 3:
                $GmoEpsilonService = $this->app['eccube.plugin.epsilon.service.convenience'];
                break;
            // ネット銀行決済(ジャパンネット銀行)
            case 4:
                $GmoEpsilonService = $this->app['eccube.plugin.epsilon.service.netbank_jnb'];
                break;
            // ネット銀行決済(楽天銀行)
            case 5:
                $GmoEpsilonService = $this->app['eccube.plugin.epsilon.service.netbank_rakuten'];
                break;
            // ペイジー決済
            case 7:
                $GmoEpsilonService = $this->app['eccube.plugin.epsilon.service.payeasy'];
                break;
            // WebMoney決済
            case 8:
                $GmoEpsilonService = $this->app['eccube.plugin.epsilon.service.webmoney'];
                break;
            // Yahoo!ウォレット決済サービス
            case 9:
                $GmoEpsilonService = $this->app['eccube.plugin.epsilon.service.ywallet'];
                break;
            // Paypal決済
            case 11:
                $GmoEpsilonService = $this->app['eccube.plugin.epsilon.service.paypal'];
                break;
            // Bitcash決済
            case 12:
                $GmoEpsilonService = $this->app['eccube.plugin.epsilon.service.bitcash'];
                break;
            // 電子マネーちょコム決済
            case 13:
                $GmoEpsilonService = $this->app['eccube.plugin.epsilon.service.chocom'];
                break;
            // スマートフォンキャリア決済
            case 15:
                $GmoEpsilonService = $this->app['eccube.plugin.epsilon.service.sphone'];
                break;
            // JCB PREMO
            case 16:
                $GmoEpsilonService = $this->app['eccube.plugin.epsilon.service.jcb'];
                break;
            // 住信SBIネット銀行決済
            case 17:
                $GmoEpsilonService = $this->app['eccube.plugin.epsilon.service.sumishin'];
                break;
            // GMO後払い
            case 18:
                $GmoEpsilonService = $this->app['eccube.plugin.epsilon.service.deferred'];
                break;
            // メールリンク決済
            case 99:
                $GmoEpsilonService = $this->app['eccube.plugin.epsilon.service.maillink'];
                break;
            // 定期課金
            case 101:
            case 102:
            case 103:
            case 104:
            case 105:
                $GmoEpsilonService = $this->app['eccube.plugin.epsilon.service.regular'];
                break;
        }

        return $GmoEpsilonService;
    }

    function getOrderInfo($trans_code)
    {
        $objPlugin =& PluginUtil::getInstance($this->app);
        $info_conf_url = $objPlugin->getSubData('info_conf_url');
        $contract_code = $objPlugin->getSubData('contract_code');

        // リクエストパラメータを設定
        $arrParameter = array(
            'contract_code' => $contract_code,
            'trans_code' => $trans_code,
        );

        // リクエスト送信
        $arrXML = $this->app['eccube.plugin.epsilon.service.base']->sendData($info_conf_url, $arrParameter);

        return $arrXML;
    }

}
