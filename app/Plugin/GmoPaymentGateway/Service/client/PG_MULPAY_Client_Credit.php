<?php
/*
 * Copyright(c) 2015 GMO Payment Gateway, Inc. All rights reserved.
 * http://www.gmo-pg.com/
 */


/**
 * 決済モジュール 決済処理: クレジットカード
 */
namespace Plugin\GmoPaymentGateway\Service\client;

use Plugin\GmoPaymentGateway\Controller\Util\PaymentUtil;
use Plugin\GmoPaymentGateway\Controller\Util\PluginUtil;

class PG_MULPAY_Client_Credit extends PG_MULPAY_Client_Base
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
        $this->const = $app['config']['GmoPaymentGateway']['const'];
    }

    function doSecureTran($order_id, $listParam, $PaymentExtension)
    {

        $this->setResults($listParam);
        $objMdl =& PluginUtil::getInstance($this->app);
        $objUtil = new PaymentUtil($this->app);
        $OrderExtension = $objUtil->getOrderPayData($order_id);
        $orderGmoInfo = $OrderExtension->getGmoOrderPayment();
        $mdl_pg_paydata = null;

        if (!empty($orderGmoInfo)) {
            $mdl_pg_paydata = $orderGmoInfo->getMemo05();
        }
        if (!is_null($mdl_pg_paydata)) {
            $arrPayData = unserialize($mdl_pg_paydata);
        } else {
            $error_message = "3Dセキュア認証遷移エラー:決済データが受注情報に見つかりませんでした.";
            $this->setError($error_message);
            return false;
        }

        if (isset($arrPayData['MD']) && $arrPayData['MD'] != $listParam['MD']) {
            $error_message = '3Dセキュア認証遷移エラー:取引ID(MD)が一致しませんでした。(' . $listParam['MD'] . ':' . $arrPayData['MD'] . ')';
            $this->setError($error_message);
            return false;
        }

        if (!isset($listParam['PaRes']) || is_null($listParam['PaRes'])) {
            $this->setError('本人認証サービスの結果電文が見つかりませんでした。');
            return false;
        }

        $gmoSetting = $objMdl->getUserSettings();

        $server_url = $gmoSetting['server_url'] . 'SecureTran.idPass';

        $sendKey = array(
            'PaRes',
            'MD',
        );
        $paymentConfig = $PaymentExtension->getArrPaymentConfig();
        $paymentUtil = new PaymentUtil($this->app);
        if ($paymentUtil->isSubscription()) { // Check purchase product with regular type
            if (isset($paymentConfig['JobCd']) && !is_null($paymentConfig['JobCd'])) {
                $paymentConfig['JobCd'] = 'CHECK';
            }
        }
        $listParam['action_status'] = $this->const['PG_MULPAY_ACTION_STATUS_RECV_NOTICE'];
        if (isset($paymentConfig['JobCd']) && !is_null($paymentConfig['JobCd'])) {
            $status_action = 'PG_MULPAY_PAY_STATUS_' . $paymentConfig['JobCd'];
            $listParam['success_pay_status'] = $this->const[$status_action];
        } else {
            $listParam['success_pay_status'] = $this->const['PG_MULPAY_PAY_STATUS_AUTH'];
        }
        $listParam['fail_pay_status'] = $this->const['PG_MULPAY_PAY_STATUS_FAIL'];
        $ret = $this->sendOrderRequest($server_url, $sendKey, $order_id, $listParam, $PaymentExtension, $gmoSetting);

        return $ret;
    }

    function doPaymentRequest(\Plugin\GmoPaymentGateway\Controller\DataObj\OrderExtension $OrderExtension, $listParam,
                              \Plugin\GmoPaymentGateway\Controller\DataObj\PaymentExtension $PaymentExtension)
    {
        $paymentUtil = new PaymentUtil($this->app);
        $objMdl =& PluginUtil::getInstance($this->app);
        $orderGmoInfo = $OrderExtension->getGmoOrderPayment();
        $gmoSetting = $objMdl->getUserSettings();
        $is_pass = false;
        $mdl_pg_paydata = null;
        if (!empty($orderGmoInfo)) {
            $mdl_pg_paydata = $orderGmoInfo->getMemo05();
        }
        if (!is_null($mdl_pg_paydata)) {
            $arrPayData = unserialize($mdl_pg_paydata);

            if (isset($arrPayData['AccessID']) && isset($arrPayData['AccessPass'])) {
                $is_pass = true;
                $OrderExtension->setPaymentData((array)$arrPayData);
            }
        }

        // 定期の場合、利用中の定期用カードが存在するかどうかを
        // チェックする
        if ($paymentUtil->isSubscription()) {
            if (is_callable(array('\Plugin\GmoPaymentGatewaySubscription\Repository\GmoSubsOrderRepository', 'getLatestCardSeq2'))) {
                $subs_card_seq = "";
                $this->app['eccube.plugin.subs.repository.gmo_subs_order']->setApp($this->app);
                $customerId = $OrderExtension->getOrder()->getCustomer()->getId();
                $result = $this->app['eccube.plugin.subs.repository.gmo_subs_order']->getLatestCardSeq2($customerId);
                if (count($result) > 0) {
                    $subs_card_seq = $result[0]['card_seq'];
                }
                if (!empty($subs_card_seq)) {
                    // 利用中の定期用カードが存在する
                    $this->setError("既に定期契約に利用しているカードがあります。既存カードをご利用ください。");
                    return false;
                }
            }
        }

        $server_url = $gmoSetting['server_url'] . 'EntryTran.idPass';
        $sendKey = array(
            'ShopID',
            'ShopPass',
            'OrderID',
            'JobCd',
            'Amount',
            'TdFlag',
            'TdTenantName',
        );

        $listParam['action_status'] = $this->const['PG_MULPAY_ACTION_STATUS_ENTRY_REQUEST'];
        $listParam['pay_status'] = $this->const['PG_MULPAY_PAY_STATUS_UNSETTLED'];
        $listParam['success_pay_status'] = '';
        $listParam['fail_pay_status'] = $this->const['PG_MULPAY_PAY_STATUS_FAIL'];

        if (!$is_pass) {
            $ret = $this->sendOrderRequest($server_url, $sendKey, $OrderExtension->getOrder()->getId(), $listParam, $PaymentExtension, $gmoSetting);
            if (!$ret) {
                return $ret;
            }
        }

        $server_url = $gmoSetting['server_url'] . 'ExecTran.idPass';
        $sendKey = array(
            'AccessID',
            'AccessPass',
            'OrderID',
            'Method',
            'PayTimes',
            'CardNo',
            'Expire',
            'SecurityCode',
            'ClientField1',
            'ClientField2',
            'ClientField3',
            'ClientFieldFlag'
        );

        $sendKey[] = 'HttpAccept';
        $sendKey[] = 'HttpUserAgent';
        $sendKey[] = 'DeviceCategory';

        $listParam['action_status'] = $this->const['PG_MULPAY_ACTION_STATUS_EXEC_REQUEST'];
        $listParam['pay_status'] = '';
        $arrPaymentConfig = $PaymentExtension->getArrPaymentConfig();
        if ($paymentUtil->isSubscription()) { // Check purchase product with regular type
            if (isset($arrPaymentConfig['JobCd']) && !is_null($arrPaymentConfig['JobCd'])) {
                $arrPaymentConfig['JobCd'] = 'CHECK';
            }
        }
        if (!is_null($arrPaymentConfig['JobCd'])) {
            $status_action = 'PG_MULPAY_PAY_STATUS_' . $arrPaymentConfig['JobCd'];
            $listParam['success_pay_status'] = $this->const[$status_action];
        } else {
            $listParam['success_pay_status'] = $this->const['PG_MULPAY_PAY_STATUS_AUTH'];
        }
        $listParam['fail_pay_status'] = $this->const['PG_MULPAY_PAY_STATUS_FAIL'];

        if (!$paymentUtil->isSubscription()) {
            if ($arrPaymentConfig['TdFlag'] == '1') {
                $listParam['success_pay_status'] = $this->const['PG_MULPAY_PAY_STATUS_UNSETTLED'];
            }
        }

        $ret = $this->sendOrderRequest($server_url, $sendKey, $OrderExtension->getOrder()->getId(), $listParam, $PaymentExtension, $gmoSetting);
        
        return $ret;
    }

    function doTokenRequest(\Plugin\GmoPaymentGateway\Controller\DataObj\OrderExtension $OrderExtension, $listParam,
                              \Plugin\GmoPaymentGateway\Controller\DataObj\PaymentExtension $PaymentExtension)
    {
        $objMdl =& PluginUtil::getInstance($this->app);
        $orderGmoInfo = $OrderExtension->getGmoOrderPayment();
        $gmoSetting = $objMdl->getUserSettings();
        $is_pass = false;
        $mdl_pg_paydata = null;
        if (!empty($orderGmoInfo)) {
            $mdl_pg_paydata = $orderGmoInfo->getMemo05();
        }
        if (!is_null($mdl_pg_paydata)) {
            $arrPayData = unserialize($mdl_pg_paydata);

            if (isset($arrPayData['AccessID']) && isset($arrPayData['AccessPass'])) {
                $is_pass = true;
                $OrderExtension->setPaymentData((array)$arrPayData);
            }
        }

        $server_url = $gmoSetting['server_url'] . 'EntryTran.idPass';
        $sendKey = array(
            'ShopID',
            'ShopPass',
            'OrderID',
            'JobCd',
            'Amount',
            'TdFlag',
            'TdTenantName',
        );

        $listParam['action_status'] = $this->const['PG_MULPAY_ACTION_STATUS_ENTRY_REQUEST'];
        $listParam['pay_status'] = $this->const['PG_MULPAY_PAY_STATUS_UNSETTLED'];
        $listParam['success_pay_status'] = '';
        $listParam['fail_pay_status'] = $this->const['PG_MULPAY_PAY_STATUS_FAIL'];

        if (!$is_pass) {
            $ret = $this->sendOrderRequest($server_url, $sendKey, $OrderExtension->getOrder()->getId(), $listParam, $PaymentExtension, $gmoSetting);
            if (!$ret) {
                return $ret;
            }
        }
        $server_url = $gmoSetting['server_url'] . 'ExecTran.idPass';
        $sendKey = array(
            'AccessID',
            'AccessPass',
            'OrderID',
            'Method',
            'PayTimes',
            'Token',
            'ClientField1',
            'ClientField2',
            'ClientField3',
        );

        $sendKey[] = 'HttpAccept';
        $sendKey[] = 'HttpUserAgent';
        $sendKey[] = 'DeviceCategory';

        $listParam['action_status'] = $this->const['PG_MULPAY_ACTION_STATUS_EXEC_REQUEST'];
        $listParam['pay_status'] = '';
        $arrPaymentConfig = $PaymentExtension->getArrPaymentConfig();
        if (!is_null($arrPaymentConfig['JobCd'])) {
            $status_action = 'PG_MULPAY_PAY_STATUS_' . $arrPaymentConfig['JobCd'];
            $listParam['success_pay_status'] = $this->const[$status_action];
        } else {
            $listParam['success_pay_status'] = $this->const['PG_MULPAY_PAY_STATUS_AUTH'];
        }
        $listParam['fail_pay_status'] = $this->const['PG_MULPAY_PAY_STATUS_FAIL'];

        if ($arrPaymentConfig['TdFlag'] == '1') {
            $listParam['success_pay_status'] = $this->const['PG_MULPAY_PAY_STATUS_UNSETTLED'];
        }

        $ret = $this->sendOrderRequest($server_url, $sendKey, $OrderExtension->getOrder()->getId(), $listParam, $PaymentExtension, $gmoSetting);
        
        return $ret;
    }

}
