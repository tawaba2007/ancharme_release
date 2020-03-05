<?php
/*
 * Copyright(c) 2016 GMO Payment Gateway, Inc. All rights reserved.
 * http://www.gmo-pg.com/
 */

namespace Plugin\GmoPaymentGateway\Service\client;
use Plugin\GmoPaymentGateway\Controller\Util\PluginUtil ;

/**
 * 決済モジュール 決済処理: ソフトバンクケータイ支払い
 */
class PG_MULPAY_Client_Sb extends PG_MULPAY_Client_Base {
    protected $app;
    protected $const;

    /**
     * コンストラクタ
     *
     * @return void
     */
    function __construct(\Eccube\Application $app) {
        parent::__construct($app);
        $this->app = $app;
        $this->const = $app['config']['GmoPaymentGateway']['const'];
    }

    function doPaymentRequest
        (\Plugin\GmoPaymentGateway\Controller\DataObj\OrderExtension $orderExtension,
         $listParam = array(),
         \Plugin\GmoPaymentGateway\Controller\DataObj\PaymentExtension $paymentExtension)
    {
        $objMdl =& PluginUtil::getInstance($this->app);
        $order = $orderExtension->getOrder();
        $gmoSetting = $objMdl->getUserSettings();

        $server_url = $gmoSetting['server_url'] . 'EntryTranSb.idPass';

        $sendKey = array(
            'ShopID',
            'ShopPass',
            'OrderID',
            'JobCd',
            'Amount',
        );

        $listParam['action_status'] = $this->const['PG_MULPAY_ACTION_STATUS_ENTRY_REQUEST'];
        $listParam['pay_status'] = $this->const['PG_MULPAY_PAY_STATUS_UNSETTLED'];
        $listParam['success_pay_status'] = '';
        $listParam['fail_pay_status'] = $this->const['PG_MULPAY_PAY_STATUS_FAIL'];

        $OrderID = $order->getId() . '-' . date('dHis');

        $ret = $this->sendOrderRequest($server_url, $sendKey, $OrderID, $listParam, $paymentExtension, $gmoSetting);
        if (!$ret) {
            return $ret;
        }

        $server_url = $gmoSetting['server_url'] . 'ExecTranSb.idPass';
        $sendKey = array(
            'ShopID',
            'ShopPass',
            'AccessID',
            'AccessPass',
            'OrderID',
            'ClientField1',
            'ClientField2',
            'ClientField3',
            'RetURL',
            'PaymentTermSec',
        );

        $listParam['action_status'] = $this->const['PG_MULPAY_ACTION_STATUS_EXEC_REQUEST'];
        $listParam['pay_status'] = '';
        $listParam['success_pay_status'] = '';
        $listParam['fail_pay_status'] = $this->const['PG_MULPAY_PAY_STATUS_FAIL'];

        $ret = $this->sendOrderRequest($server_url, $sendKey, $OrderID, $listParam, $paymentExtension, $gmoSetting);
        return $ret;
    }
}
