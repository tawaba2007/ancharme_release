<?php


/**
 * 決済モジュール 決済処理:
 */
namespace Plugin\GmoEpsilon\Service\Client;

use Plugin\GmoEpsilon\Util\PaymentUtil;
use Plugin\GmoEpsilon\Util\PluginUtil;
use Eccube\Entity\MailHistory;

class GmoEpsilon_Payeasy extends GmoEpsilon_Base
{

    /**
     * コンストラクタ
     *
     * @return void
     */
    function __construct(\Eccube\Application $app)
    {
        parent::__construct($app);
        $this->app = $app;
        $this->const = $app['config']['GmoEpsilon']['const'];
    }

    /**
     * 受注情報を更新
     *
     * @param \Eccube\Entity\Order $Order
     * @param array $response
     */
    function updateOrder($Order, $response)
    {
        $errInfo = array();
        // データ送信
        $objPlugin =& PluginUtil::getInstance($this->app);
        $info_conf_url = $objPlugin->getSubData('info_conf_url');

        // ペイジー決済のリクエストパラメータを設定
        $arrPayeasyParameter = array(
            'contract_code' => $objPlugin->getSubData('contract_code'),
            'order_number' => $response['order_number'],
        );

        // リクエスト送信
        $arrXML = $this->sendData($info_conf_url, $arrPayeasyParameter);

        // エラーチェック
        $err_code = $this->getXMLValue($arrXML, 'RESULT', 'ERR_CODE');
        if (!empty($err_code)) {
            $this->app['monolog.gmoepsilon']->addInfo('request error. error_code = ' . $err_code);
            $errInfo['error_title'] = 'システムエラーが発生しました。';
            $errInfo['error_message'] = '注文番号'.$response['order_number'].'ペイジー決済の取得に失敗しました。'
                                        .'この注文についてショップにお問い合わせ下さい。';
        } else {
            $company_code = $this->getXMLValue($arrXML, 'RESULT', 'KIGYOU_CODE');
            $receipt_no = $this->getXMLValue($arrXML, 'RESULT', 'RECEIPT_NO');
            $payment_limit = $this->getXMLValue($arrXML, 'RESULT', 'CONVENI_LIMIT');
            $trans_code = $this->getXMLValue($arrXML, 'RESULT', 'TRANS_CODE');

            // エラーチェック
            if (empty($receipt_no) || empty($company_code) && empty($payment_limit)) {
                $this->app['monolog.gmoepsilon']->addInfo('request error payeasy.');
                $errInfo['error_title'] = 'システムエラーが発生しました。';
                $errInfo['error_message'] = '注文番号'.$response['order_number'].'ペイジー決済の取得に失敗しました。'
                                            .'この注文についてショップにお問い合わせ下さい。';
            }

            // ペイジー決済の決済情報を設定
            $arrPayInfo = array();
            $this->setPayInfo($arrPayInfo, 'title', '', 'ペイジー決済');
            $this->setPayInfo($arrPayInfo, 'company_code', '収納機関番号', $company_code);
            $this->setPayInfo($arrPayInfo, 'receipt_no', '確認番号', $receipt_no);
            $this->setPayInfo($arrPayInfo, 'payment_limit', '支払期限', $payment_limit);

            // ステータス更新
            $OrderStatus = $this->app['eccube.repository.order_status']->find($this->app['config']['order_pay_wait']);
            $this->app['eccube.repository.order']->changeStatus($Order->getId(), $OrderStatus);

            // 在庫情報更新
            $this->app['eccube.service.order']->setStockUpdate($this->app['orm.em'], $Order);

            if ($this->app->isGranted('ROLE_USER')) {
                // 会員の場合、購入金額を更新
                $this->app['eccube.service.order']->setCustomerUpdate($this->app['orm.em'], $Order, $this->app->user());
            }

            // Epsilon決済情報を拡張テーブルに登録
            $OrderExtension = new \Plugin\GmoEpsilon\Entity\Extension\OrderExtension();
            $OrderExtension->setId($Order->getId());
            $OrderExtension->setPaymentInfo(serialize($arrPayInfo));
            $OrderExtension->setTransCode($trans_code);

            $this->app['orm.em']->persist($OrderExtension);

            // セッションにorder_idを保持
            $this->app['session']->set('eccube.plugin.epsilon.orderId', $Order->getId());
        }

        return $errInfo;
    }

    /**
     * チェックするレスポンスパラメータのキーを取得
     *
     * @return array
     */
    function getCheckParameter()
    {
        return array('contract_code', 'trans_code', 'order_number', 'user_id', 'state', 'payment_code');
    }

    /**
     * 受注メールを送信
     * (Epsilon決済情報を追加したテンプレートを使用)
     *
     * @param \Eccube\Entity\Order $Order
     */
    function sendOrderMail($Order)
    {
        $orderEpsilonInfo = $this->app['eccube.plugin.epsilon.repository.order_extension']->findOneBy(array('id' => $Order->getId()));
        $arrOther = unserialize($orderEpsilonInfo->getPaymentInfo());
        $message = $this->app['eccube.plugin.epsilon.service.mail']->sendOrderMail($Order, $arrOther);

        // 送信履歴を保存.
        $MailTemplate = $this->app['eccube.repository.mail_template']->find(1);

        $MailHistory = new MailHistory();
        $MailHistory
            ->setSubject($message->getSubject())
            ->setMailBody($message->getBody())
            ->setMailTemplate($MailTemplate)
            ->setSendDate(new \DateTime())
            ->setOrder($Order);

        $this->app['orm.em']->persist($MailHistory);
        $this->app['orm.em']->flush($MailHistory);
    }

}
