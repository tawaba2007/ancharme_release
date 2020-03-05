<?php

namespace Plugin\NEConnect\Controller\Admin;

use Doctrine\ORM\NoResultException;
use Doctrine\ORM\Query\ResultSetMapping;
use Eccube\Application;
use Eccube\Common\Constant;
use Eccube\Controller\AbstractController;
use Eccube\Event\EccubeEvents;
use Eccube\Event\EventArgs;
use Symfony\Component\HttpFoundation\Request;


// 管理画面の処理をするクラス
class ConfigController
{

    public function __construct()
    {
    }

    // 管理画面でページ遷移一覧を表示する
    public function index(Application $app, Request $request)
    {
        $NEConnectConfig = $app['plg.neconnect.repository.neconnect_config']->createQueryBuilder('nec')->addOrderBy('nec.update_date', 'DESC')->setMaxResults(1)->getQuery()->getOneOrNullResult();
        // 新規登録時
        if ($NEConnectConfig == null) {
            $NEConnectConfig = new \Plugin\NEConnect\Entity\NEConnectConfig();
        }

        $builder = $app['form.factory']->createBuilder('plg_neconnect_config', $NEConnectConfig);
        $form = $builder->getForm();

        if ('POST' === $request->getMethod()) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $NEConnectConfig = $form->getData();

                // 設定情報の更新
                $Member = $app->user();
                if ($Member != null) {
                    $creatorId = $Member->getId();
                    $NEConnectConfig->setCreatorId($creatorId);
                }

                $app->addSuccess('admin.register.complete', 'admin');

                $app['orm.em']->persist($NEConnectConfig);
                $app['orm.em']->flush();
            }
        }

        $MailHistoryCollection = $app['plg.neconnect.repository.neconnect_mail_history']->getHistoryMax100();


        // 在庫API用テストコード生成 デバッグ用
        // テスト用データ
        // TotalResult="1"なら成功
        /*
        $storeAccount = 'Eccube';  // ネクストエンジン側 ストアアカウントの値
        $code         = 'cafe-01';  // 商品コード
        $stock        = '10';  // 変更後の在庫数
        $ts           = '201802160000';  // タイムスタンプ
        $sign_array = array();
        array_push($sign_array, "StoreAccount=" . $storeAccount);
        array_push($sign_array, "Code=" . $code);
        array_push($sign_array, "Stock=" . $stock);
        array_push($sign_array, "ts=" . $ts);
        $md5_data = md5(implode("&", $sign_array) . $NEConnectConfig->getApiKey());
        dump($md5_data);
        dump('/update_stock?StoreAccount=' . $storeAccount . '&Code=' . $code . '&Stock='. $stock .'&ts=' . $ts . '&.sig=' . $md5_data);
        */


        return $app->render('\NEConnect\Resource\template\admin\config.twig',
            array(
                'NEConnectConfig' => $NEConnectConfig,
                'form'            => $form->createView(),
                'HistoryCollection' => $MailHistoryCollection,
            )
        );
    }

    public function mailEdit(Application $app, Request $request, $id)
    {

        $MailHistory = $app['plg.neconnect.repository.neconnect_mail_history']->findOneBy(array('id' => $id));
        $MailHistory->setSubject('[再送]' . $MailHistory->getSubject());


        $builder = $app['form.factory']->createBuilder('plg_neconnect_mail_edit', $MailHistory);
        $form = $builder->getForm();


        if ('POST' === $request->getMethod()) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $MailHistory = $form->getData();

                $app->log('ネクストエンジン向け受注メール送信開始 [管理画面から手動で再送]');

                $sendTo  = $MailHistory->getSendTo();
                $subject = $MailHistory->getSubject();
                $body    = $MailHistory->getMailBody();
                $orderId = $MailHistory->getOrderId();


                // メール送信
                $BaseInfo = $app['eccube.repository.base_info']->get();
                $message = \Swift_Message::newInstance()
                    ->setSubject($subject)
                    ->setFrom(array($BaseInfo->getEmail01() => $BaseInfo->getShopName()))
                    ->setTo($sendTo)
                    ->setBcc($BaseInfo->getEmail01())
                    ->setReplyTo($BaseInfo->getEmail03())
                    ->setReturnPath($BaseInfo->getEmail04())
                    ->setBody($body);

                $count = $app->mail($message);

                // 送信履歴を保存
                $MailHistory = new \Plugin\NEConnect\Entity\NEConnectMailHistory();
                $MailHistory
                    ->setSendTo($sendTo)
                    ->setSubject($message->getSubject())
                    ->setMailBody($message->getBody())
                    ->setSendDate(new \DateTime())
                    ->setOrderId($orderId);

                $app['orm.em']->persist($MailHistory);
                $app['orm.em']->flush($MailHistory);

                $app->log('ネクストエンジン向け受注メール送信完了', array('count' => $count));

                return $app->redirect($app->url('plugin_NEConnect_config'));
            }
        }


        return $app->render('\NEConnect\Resource\template\admin\mail_detail.twig',
            array(
                'MailHistory' => $MailHistory,
                'form'        => $form->createView(),
            )
        );
    }
}