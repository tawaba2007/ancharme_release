<?php

namespace Plugin\GmoEpsilon\Service\Client;

/**
 * 決済モジュール 決済処理：電子マネーちょコム決済
 */
class GmoEpsilon_Chocom extends GmoEpsilon_Base
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
     * チェックするレスポンスパラメータのキーを取得
     *
     * @return array
     */
    function getCheckParameter()
    {
        return array('contract_code', 'trans_code', 'order_number', 'user_id', 'state', 'payment_code');
    }

}
