<?php

namespace Plugin\GmoEpsilon\Service\Client;

/**
 * 決済モジュール 決済処理：ネット銀行決済(ジャパンネット銀行)
 */
class GmoEpsilon_Netbank_Jnb extends GmoEpsilon_Base
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
        return array('trans_code', 'order_number', 'user_id', 'state', 'payment_code');
    }

}
