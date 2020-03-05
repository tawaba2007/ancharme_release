<?php

namespace Plugin\NEConnect;

use Eccube\Application;
use Eccube\Common\Constant;
use Eccube\Entity\Category;
use Eccube\Event\EventArgs;
use Eccube\Event\TemplateEvent;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class Event
{

    const SESSION_NECONNECT_ORDER_ID = 'eccube.plugin.neconnect.order.id';

    /** @var \Eccube\Application $app */
    private $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function setOrderIdToSession(EventArgs $event)
    {
        $Order = $event->getArgument('Order');
        if ($Order) {
            $this->app['session']->set(self::SESSION_NECONNECT_ORDER_ID, $Order->getId());
        }
    }

    /**
     * ネクストエンジンへ受注メールを送信する
     *
     */
    public function onSendOrderMailToNE(EventArgs $event)
    {
        $orderId = $event->getArgument('orderId');
        if (!$orderId) {
            //決済プラグインによっては取得できない時があるので、独自のセッションから取得（ペイジェントは取れない）
            $orderId = $this->app['session']->get(self::SESSION_NECONNECT_ORDER_ID);
            $this->app['session']->remove(self::SESSION_NECONNECT_ORDER_ID);
        }

        $Order = $this->app['eccube.repository.order']->findOneBy(array('id'=>$orderId));

        if ($Order != null && $Order->getOrderStatus()->getId() != $this->app['config']['order_pending'] && $Order->getOrderStatus()->getId() != $this->app['config']['order_processing']) {
            // 受注情報がある場合のみ

            // 送信情報がないと送信しない
            $NEConnectConfig = $this->app['plg.neconnect.repository.neconnect_config']->createQueryBuilder('nec')->addOrderBy('nec.update_date', 'DESC')->setMaxResults(1)->getQuery()->getOneOrNullResult();
            if ($NEConnectConfig != null && $NEConnectConfig->getEmailAddress() != null) {
                // 送信情報があり、ネクストエンジンのメールアドレスが登録している場合のみ、ネクストエンジンへメールを送信
                $sendTo = $NEConnectConfig->getEmailAddress();
                $this->sendOrderMailToNE($sendTo, $Order);
            } else {
                $this->app->log('送信情報の登録がないため、ネクストエンジン向け受注メールを送信できませんでした');
            }
        }

        return;
    }
    private function sendOrderMailToNE($sendTo, \Eccube\Entity\Order $Order)
    {
        // メール送信
        $message = $this->sendOrderMailToNECore($sendTo, $Order);

        // 送信履歴を保存
        $MailHistory = new \Plugin\NEConnect\Entity\NEConnectMailHistory();
        $MailHistory
            ->setSendTo($sendTo)
            ->setSubject($message->getSubject())
            ->setMailBody($message->getBody())
            ->setSendDate(new \DateTime())
            ->setOrderId($Order->getId());

        $this->app['orm.em']->persist($MailHistory);
        $this->app['orm.em']->flush($MailHistory);

        return $MailHistory;
    }



    /**
     * ネクストエンジン向け受注メールの本文を作成して、受注メールを送信する
     *
     * [!!! ポイント情報を送信するためにはPointプラグインが必要 !!!]
     *
     * @param $sendTo
     * @param \Eccube\Entity\Order $Order 受注情報
     * @return $this
     */
    private function sendOrderMailToNECore($sendTo, \Eccube\Entity\Order $Order)
    {
        $this->app->log('ネクストエンジン向け受注メール送信開始');

        // 定義
        $fileName = 'NEConnect/Resource/template/default/Mail/order_to_NE.twig';       // メールtwigのパス
        $subject  = 'ネクストエンジン向け受注メール';  // メールの件名
        $header   = 'Eccube受注メール';             // メール文のヘッダー
        $footer   = '';                            // メール文のフッター

        // ポイント情報の取得  [!!! Pointプラグインが必要 !!!]
        $isEnabledPointPlugin = $this->isEnabledPlugin('Pointプラグイン');  // Pointプラグインがインストール[されている:true / されていない:false]
        if ($this->app->isGranted('ROLE_USER') && $isEnabledPointPlugin === true) {
            // ポイントが取得できる場合 (ユーザーがログインしていて、Pointプラグインがインストールされている場合)
            $PointInfo = $this->app['eccube.plugin.point.repository.pointinfo']->getLastInsertData();
            $pointRate = $PointInfo->getPlgPointConversionRate();  // ポイント換算レートの取得
            // getLatestPreUsePoint()だと取得できない場合があるため、getLatestUsePoint()を使用する
            $usePoint  = $this->app['eccube.plugin.point.repository.point']->getLatestUsePoint($Order);
            $usePoint  = abs($usePoint);
            if ($pointRate === null) {
                // まんがいち レートがnullの場合は x1倍 とする
                $lastPreUsePointTotal = $usePoint;
            } else {
                // レートがnullでない場合 フォームで弾いているのでnullはあり得ないが念のため
                $lastPreUsePointTotal = $usePoint * $pointRate;  // 換算レートは整数なので[ポイント端数計算方法]設定は気にしない
            }
            $lastPreUsePoint      = $usePoint;
        } else {
            // ポイントが取得できない場合 (ユーザーがログインしていない || Pointプラグインがインストールされていない場合)
            $lastPreUsePointTotal = null;
            $lastPreUsePoint      = null;
        }

        // お届け希望日の生成 (ネクストエンジン指定のフォーマットにする)
        $deliveryDateArray = array();
        foreach ($Order->getShippings() as $Shipping) {
            if ($Shipping != null && $Shipping->getShippingDeliveryDate() != null) {
                $deliveryDateArray[$Shipping->getId()] = $Shipping->getShippingDeliveryDate()->format('Y年m月d日');
            }
        }

        // メール本文の作成
        $body = $this->app->renderView($fileName, array(
            'header' => $header,
            'footer' => $footer,
            'Order'  => $Order,
            'createDate'           => $Order->getOrderDate()->format('Y年m月d日 H時i分s秒'),
            'lastPreUsePointTotal' => $lastPreUsePointTotal,
            'lastPreUsePoint'      => $lastPreUsePoint,
            'deliveryDateArray' => $deliveryDateArray,
        ));

        // メール送信
        $BaseInfo = $this->app['eccube.repository.base_info']->get();
        $message = \Swift_Message::newInstance()
            ->setSubject('[' . $BaseInfo->getShopName() . '] ' . $subject)
            ->setFrom(array($BaseInfo->getEmail01() => $BaseInfo->getShopName()))
            ->setTo($sendTo)
            ->setBcc($BaseInfo->getEmail01())
            ->setReplyTo($BaseInfo->getEmail03())
            ->setReturnPath($BaseInfo->getEmail04())
            ->setBody($body);

        $count = $this->app->mail($message);

        $this->app->log('ネクストエンジン向け受注メール送信完了', array('count' => $count));

        return $message;
    }


    // Pointプラグインがインストールされているかどうか判定する
    // インストール[されている:true / されていない:false]
    private function isEnabledPlugin($pluginName)
    {
        if ($pluginName == null) {
            return false;
        }

        $Plugin = $this->app['eccube.repository.plugin']->findOneBy(array('name' => $pluginName));
        if ($Plugin != null && $Plugin->getEnable() === Constant::ENABLED) {
            return true;
        } else {
            return false;
        }
    }

}