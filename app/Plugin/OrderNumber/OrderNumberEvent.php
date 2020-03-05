<?php
/**
 * This file is part of the OrderNumber
 *
 * Copyright (C) 2016 IDS Corporation
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\OrderNumber;

use Doctrine\ORM\Query\ResultSetMapping;
use Eccube\Application;
use Eccube\Event\EventArgs;
use Eccube\Event\TemplateEvent;
use Plugin\OrderNumber\PluginManager;

class OrderNumberEvent
{

    /**
     * @var \Eccube\Application
     */
    private $app;

    /**
     * @var string 受注IDキー
     */
    private $sessionOrderKey = 'eccube.front.shopping.order.id';

    /**
     * OrderNumber constructor.
     *
     * @param $app
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    public function onAdminOrderSearchRender (TemplateEvent $event)
    {

        $app = $this->app;
        $parameters = $event->getParameters();

        $OrderNumber = $app['eccube.plugin.order_number.repository.order_number']->findAll();

        // 注文IDをキーに注文番号をセット
        $OrderNumberList = [];
        if (!is_null($OrderNumber)) {
            foreach ($OrderNumber as $value) {
                $OrderNumberList[$value->getOrderId()] = $value->getOrderNumber();
            }
        }

        $parameters['OrderNumberList'] = $OrderNumberList;

        // 注文マスター一覧画面で注文番号を表示
        $search = '<th id="result_list_main__header_id">注文番号</th>';
        $replace = '<th id="result_list_main__header_id">注文ID</th><th id="result_list_main__header_id">注文番号</th>';
        $source = str_replace($search, $replace, $event->getSource());
        $search = '>{{ Order.id }}</a></td>';
        $replace = '>{{ Order.id }}</a></td><td id="result_list_main__order_number--{{ Order.id }}">{% if OrderNumberList[Order.id] is defined and OrderNumberList[Order.id] is not empty %}{{ OrderNumberList[Order.id] }}{% endif %}</td>';
        $source = str_replace($search, $replace, $source);
        $event->setSource($source);

        $event->setParameters($parameters);

    }

    public function onAdminOrderEditRender (TemplateEvent $event)
    {

        $app = $this->app;
        $parameters = $event->getParameters();

        // 注文番号テーブルを取得
        $OrderNumber = $app['eccube.plugin.order_number.repository.order_number']->findOneBy(array(
            'order_id' => $parameters['Order']->getId()
        ));

        // 注文IDをキーに注文番号をセット
        if (!is_null($OrderNumber)) {
            $parameters['OrderNumber'] = $OrderNumber->getOrderNumber();
        } else {
            $parameters['OrderNumber'] = "";
        }

        // 注文編集画面で注文番号を表示
        $search = '<h4>注文番号 <span class="number">{{ Order.id }}</span></h4>';
        $replace = '<h4>注文ID <span class="number">{{ Order.id }}</span></h4><h4>注文番号 <span class="number">{{ OrderNumber }}</span></h4>';
        $source = str_replace($search, $replace, $event->getSource());
        $event->setSource($source);

        $event->setParameters($parameters);

    }

    public function onAdminOrderMailConfirmRender (TemplateEvent $event)
    {

        $app = $this->app;
        $parameters = $event->getParameters();

        $OrderNumber = $app['eccube.plugin.order_number.repository.order_number']->findOneBy(array(
            'order_id' => $parameters['Order']->getId()
        ));

        if (!is_null($OrderNumber)) {
            $search = 'ご注文番号：'.$parameters['Order']->getId();
            $replace = 'ご注文ID：'.$parameters['Order']->getId().PHP_EOL.'ご注文番号：'.$OrderNumber->getOrderNumber();
            $parameters['body'] = str_replace($search, $replace, $parameters['body']);
        }

        $event->setParameters($parameters);
    }

    public function onAdminOrderMailAllConfirmRender (TemplateEvent $event)
    {

        $app = $this->app;
        $parameters = $event->getParameters();

        $order_id_arr = explode(",",$parameters['ids']);
        $OrderNumber = $app['eccube.plugin.order_number.repository.order_number']->findOneBy(array(
            'order_id' => $order_id_arr[0]
        ));

        if (!is_null($OrderNumber)) {
            $search = 'ご注文番号：'.$order_id_arr[0];
            $replace = 'ご注文ID：'.$order_id_arr[0].PHP_EOL.'ご注文番号：'.$OrderNumber->getOrderNumber();
            $parameters['body'] = str_replace($search, $replace, $parameters['body']);
        }

        $event->setParameters($parameters);
    }

    public function onMypageIndexRender(TemplateEvent $event)
    {
        $app = $this->app;
        $parameters = $event->getParameters();

        $OrderNumber = $app['eccube.plugin.order_number.repository.order_number']->findAll();

        // 注文IDをキーに注文番号をセット
        $OrderNumberList = [];
        if (!is_null($OrderNumber)) {
            foreach ($OrderNumber as $value) {
                $OrderNumberList[$value->getOrderId()] = $value->getOrderNumber();
            }
        }

        $parameters['OrderNumberList'] = $OrderNumberList;

        // 注文マスター一覧画面で注文番号を表示
        $search = '<dt id="history_list__header_order_id--{{ Order.id }}">ご注文番号：</dt>';
        $replace = '<dt id="history_list__header_order_id--{{ Order.id }}">ご注文ID：</dt>';
        $source = str_replace($search, $replace, $event->getSource());
        $search = '<dd id="history_list__order_id--{{ Order.id }}">{{ Order.id }}</dd>';
        $replace = '<dd id="history_list__order_id--{{ Order.id }}">{{ Order.id }}</dd><dt id="history_list__header_order_id--{{ Order.id }}">ご注文番号：</dt><dd id="history_list__order_id--{{ Order.id }}">{% if OrderNumberList[Order.id] is defined and OrderNumberList[Order.id] is not empty %}{{ OrderNumberList[Order.id] }}{% else %}&nbsp;{% endif %}</dd>';
        $source = str_replace($search, $replace, $source);
        $event->setSource($source);

        $event->setParameters($parameters);
    }

    public function onMypageHistoryRender(TemplateEvent $event)
    {
        $app = $this->app;
        $parameters = $event->getParameters();

        $OrderNumber = $app['eccube.plugin.order_number.repository.order_number']->findOneBy(array(
            'order_id' => $parameters['Order']->getId()
        ));
        // 注文IDをキーに注文番号をセット
        if (!is_null($OrderNumber)) {
            $parameters['OrderNumber'] = $OrderNumber->getOrderNumber();
        } else {
            $parameters['OrderNumber'] = "";
        }

        // 注文編集画面で注文番号を表示
        $search = '<dt id="detail_box__id">ご注文番号：</dt>';
        $replace = '<dt id="detail_box__id">ご注文ID：</dt>';
        $source = str_replace($search, $replace, $event->getSource());
        $search = '<dd>{{ Order.id }}</dd>';
        $replace = '<dd>{{ Order.id }}</dd><dt id="detail_box__id">ご注文番号：</dt><dd>{% if OrderNumber is defined and OrderNumber is not empty %}{{ OrderNumber }}{% else %}&nbsp;{% endif %}</dd>';
        $source = str_replace($search, $replace, $source);
        $event->setSource($source);

        $event->setParameters($parameters);
    }

    public function onShoppingInitialize(EventArgs $event)
    {
        $app = $this->app;

        $Order = $app['eccube.service.shopping']->getOrder($app['config']['order_processing']);

        $OrderNumber = $app['eccube.plugin.order_number.repository.order_number']->findOneBy(array(
            'order_id' => $Order->getId()
        ));
        $OrderNumberFormat = $app['eccube.plugin.order_number.repository.order_number_format']->find(1);

        $format_set = "";


        // 注文番号の設定がある場合
        if (!is_null($OrderNumberFormat)) {
            $reset_ckeck = "";          // リセットを行う場合の比較値を取得
            $front_format_set = "";     // 注文番号前部分
            $rear_format_set = "";      // 注文番号後ろ部分

            // 桁数のセット
            if (is_null($OrderNumberFormat->getDigit())) {
                $digit = "%01d";
            } else {
                $digit = "%0".$OrderNumberFormat->getDigit()."d";
            }

            // -----  注文番号前部分のセット start  -----
            // 年月日
            if ($OrderNumberFormat->getFrontFormatType() == 1) {
                $front_format_set = date("Ymd");
                $reset_ckeck = $front_format_set;
            // 月日
            } else if ($OrderNumberFormat->getFrontFormatType() == 2) {
                $front_format_set = date("md");
                $reset_ckeck = $front_format_set;
            // 日
            } else if ($OrderNumberFormat->getFrontFormatType() == 3) {
                $front_format_set = date("d");
                $reset_ckeck = $front_format_set;
            }
            // -----  注文番号前部分のセット end  -----

            // -----  注文番号後ろ部分のセット start  -----
            // 注文ID
            if ($OrderNumberFormat->getRearFormatType() == 1) {
                $rear_format_set = sprintf($digit, $Order->getId());
            // フォーマットタイプ前部分でリセット
            } else if ($OrderNumberFormat->getRearFormatType() == 2) { 
                // 注文番号前部分がある場合
                if ($front_format_set) {
                    // 一つ前の注文番号を取得
                    $BeOrderNumber = $app['eccube.plugin.order_number.repository.order_number']->findOneBy(array(
                        'order_id' => $Order->getId()-1
                    ));

                    // 一つ前の注文番号がない場合、1からふり直す
                    if (is_null($BeOrderNumber) || is_null($BeOrderNumber->getOrderNumber())) {
                        $rear_format_set = sprintf($digit, 1);
                    // 一つ前の注文番号がある場合
                    } else {
                        // ハイフンで分割
                        $Order_be_id = explode("-",$BeOrderNumber->getOrderNumber());
                        // 注文番号前部分と本日の比較値が一致した場合は連番
                        if ($Order_be_id[0] == $reset_ckeck) {
                            $rear_format_set = sprintf($digit, ($Order_be_id[1] + 1));
                        // 注文番号前部分と本日の比較値が一致しない場合、1からふり直す
                        } else {
                            $rear_format_set = sprintf($digit, 1);
                        }
                    }
                // 注文番号前部分がない場合(jquery不正操作)
                } else {
                    $rear_format_set = sprintf($digit, $Order->getId());
                }
            // 乱数10桁
            } else if ($OrderNumberFormat->getRearFormatType() == 3) {
                if ($front_format_set) {
                    $select = "CONCAT('".$front_format_set."-',LPAD(FLOOR(RAND() * 9999999999), 10, 0)) AS random_num";
                } else {
                    $select = "LPAD(FLOOR(RAND() * 9999999999), 10, 0) AS random_num";
                }
                $sql = '
                    SELECT 
                        '.$select.'
                    FROM
                        plg_order_number
                    WHERE
                        "random_num" NOT IN
                            (
                            SELECT 
                                order_number
                            FROM
                                plg_order_number
                            )
                    LIMIT 1
                ';
                $rsm = new ResultSetMapping();
                $rsm->addScalarResult('random_num', 'random_num');
                $q = $app['orm.em']->createNativeQuery($sql, $rsm);
                if (!is_null($q->getResult()[0])) {
                    if ($front_format_set) {
                        $random_number = explode('-',$q->getResult()[0]['random_num']);
                        $rear_format_set = $random_number[1];
                    } else {
                        $rear_format_set = $q->getResult()[0]['random_num'];
                    }
                } else {
                    $random = "";
                    for($i = 0; $i < 10; $i++){
                        if ($i == 0) {
                            $random .= mt_rand(1,9);
                        } else {
                            $random .= mt_rand(0,9);
                        }
                    }
                    $rear_format_set = $random;
                }
            }
            // -----  注文番号後ろ部分のセット start  -----

            // 注文番号前部分と後ろ部分がある場合はハイフンで結合
            if ($front_format_set && $rear_format_set) {
                $format_set = $front_format_set."-".$rear_format_set;
            // 注文番号後ろ部分だけの場合、後ろ部分のみを注文番号にセット
            } else if (!$front_format_set && $rear_format_set) {
                $format_set = $rear_format_set;
            // 注文番号前部分だけの場合、前部分のみを注文番号にセット
            } else if ($front_format_set && !$rear_format_set) {
                $format_set = $front_format_set;
            // それ以外は注文IDをセット
            } else {
                $format_set = sprintf($digit, $Order->getId());
            }

        // 注文番号の設定がない場合、注文IDをセット
        } else {
            $format_set = $Order->getId();
        }

        // 注文番号テーブルに注文IDと注文番号をセット
        if (is_null($OrderNumber)) {
            $OrderNumber = new \Plugin\OrderNumber\Entity\OrderNumber();
            $OrderNumber
                ->setOrderId($Order->getId())
                ->setOrderNumber($format_set);
            $app['orm.em']->persist( $OrderNumber );
            $app['orm.em']->flush();
        }
    }

    public function onShoppingConfirm(EventArgs $event)
    {
        $app = $this->app;

        // 注文IDより注文番号を取得
        $orderId = $app['session']->get($this->sessionOrderKey);
        $OrderNumber = $app['eccube.plugin.order_number.repository.order_number']->findOneBy(array(
            'order_id' => $orderId
        ));

        // 注文番号をセッションにセット
        $app['session']->set($this->sessionOrderKey, $OrderNumber->getOrderNumber());
    }

    public function onMailOrder (EventArgs $event)
    {
        $app = $this->app;

        // セッションより注文IDを取得
        $orderId = $app['session']->get($this->sessionOrderKey);
        $OrderNumber = $app['eccube.plugin.order_number.repository.order_number']->findOneBy(array(
            'order_id' => $orderId
        ));

        $mail_message = $event->getArgument('message');

        // 注文完了時のメール送信で注文IDを注文番号に変更
        if (!is_null($OrderNumber)) {
            $search = 'ご注文番号：'.$orderId;
            $replace = 'ご注文ID：'.$orderId.PHP_EOL.'ご注文番号：'.$OrderNumber->getOrderNumber();
        }
        $body = str_replace($search, $replace, $mail_message->getBody());
        $mail_message->setBody($body);

    }

    public function onMailAdminOrder (EventArgs $event)
    {
        $app = $this->app;

        $OrderNumber = $app['eccube.plugin.order_number.repository.order_number']->findOneBy(array(
            'order_id' => $event->getArgument('Order')->getId()
        ));

        $mail_message = $event->getArgument('message');

        // 管理画面からのメールで注文IDを注文番号に変更
        if (!is_null($OrderNumber)) {
            $search = 'ご注文番号：'.$event->getArgument('Order')->getId();
            $replace = 'ご注文ID：'.$event->getArgument('Order')->getId().PHP_EOL.'ご注文番号：'.$OrderNumber->getOrderNumber();
        }
        $body = str_replace($search, $replace, $mail_message->getBody());
        $mail_message->setBody($body);

    }
}
