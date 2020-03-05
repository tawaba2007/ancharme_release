<?php

namespace Plugin\GmoEpsilon\Service\Client;

/**
 * 決済モジュール 決済処理: クレジットカード
 */
class GmoEpsilon_Credit extends GmoEpsilon_Base
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
     * 決済処理
     *
     * @param \Eccube\Entity\Order $Order
     * @param \Plugin\GmoEpsilon\Entity\Extension\PaymentExtension $PaymentExtension
     * @return render
     */
    function payProcess($Order, $PaymentExtension)
    {
        // 不正アクセスブロック処理を行う
        $error_page_flg = $this->accessBlockProcess();

        // ブロック対象の場合エラーを表示し、処理を中断
        if($error_page_flg){
            $error_title = '購入エラー';
            $error_message = '購入処理でエラーが発生しました。';
            return $this->app['view']->render('error.twig', compact('error_title', 'error_message'));
        }

        return parent::payProcess($Order, $PaymentExtension);
    }

    /**
     * チェックするレスポンスパラメータのキーを取得
     *
     * @return array
     */
    function getCheckParameter()
    {
        return array('trans_code', 'user_id', 'result', 'order_number');
    }

}
