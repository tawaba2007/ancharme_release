<?php


namespace Plugin\NEConnect\Controller;

use Eccube\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class NEConnectController
{

    /*
     * 在庫をアップデートする
     *
     * ログはsite_YYYY-MM-DD.logへ出力 ([NE Plugin])
     *
     * [テストURL例]
     * /update_stock?StoreAccount=store&Code=cafe-01&Stock=1000&ts=20190101&.sig=eab139f64ef32522f7b6c6237e352663
     * (*) .sigは環境に合わせてsiteログのmd5計算結果の値に変更する
     *
     */
    public function updateStock(Application $app, Request $request)
    {
        $methodName = '[NE Plugin] ';
        header('Content-type: text/xml');

        $app->log($methodName . 'NEPlugin stock update Start');


        $responseXml = null;  // 返却するレスポンスのXML

        $app['orm.em']->getConnection()->beginTransaction();
        try {
            // GETパラメータの取得
            $storeAccount = $request->get('StoreAccount');
            $code         = $request->get('Code');
            $stock        = $request->get('Stock');;
            $ts           = $request->get('ts');
            $sig          = $request->get('_sig');

            // APIキーの取得
            $NEConnectConfig = $app['plg.neconnect.repository.neconnect_config']->createQueryBuilder('nec')->addOrderBy('nec.update_date', 'DESC')->setMaxResults(1)->getQuery()->getOneOrNullResult();
            if ($NEConnectConfig != null) {
                $apiKey = $NEConnectConfig->getApiKey();
            } else {
                $apiKey = null;
            }
            $app->log($methodName . 'API KEY IN Eccube: ' . $apiKey);

            // パラメータ合体
            $sign_array = array();
            $sign_array[] = "StoreAccount=" . $storeAccount;
            $sign_array[] = "Code=" . $code;
            $sign_array[] = "Stock=" . $stock;
            $sign_array[] = "ts=" . $ts;
            $app->log($methodName . 'GET PARAMETERS FROM NE: ' . implode("&", $sign_array) . '&sig=' . $sig);

            $processed       = "-3";  // 初期化 -3:システムエラー
            $responseMessage = '';  // レスポンスで外向けに返すメッセージ
            $logMessage      = '';  // ログ向けのメッセージ
            $isValid         = true;  // 初期化　バリデーションが[正常:true エラー:false]
            if ($storeAccount == '' || $code == '' || $ts == '' || $sig == '' || $stock == '') {
                // パラメータが不正の場合
                $processed       = "-2";  // クライアントエラー
                //$responseMessage = 'パラメータ不正';
                $isValid         = false;  // エラー
                $app->log($methodName . 'Stock Update: [エラー] パラメータが不足しています [ERROR][PARAMETERS NOT ENOUGH]');

            } else {
                // パラメータが正しい場合

                $md5_data = md5(implode("&", $sign_array) . $apiKey);
                $app->log($methodName . 'md5計算結果: [' . $md5_data . ']');

                if ($sig != $md5_data) {
                    // 認証NGの場合
                    $processed       = "-2";  // クライアントエラー
                    $isValid         = false;  // エラー
                    $app->log($methodName . 'Stock Update: [エラー] 署名コード(.sig)が不正です [ERROR][CERTIFICATION FAILED]');

                } else {
                    // 認証OKの場合

                    /*
                     * バリデーション
                     */

                    // ProductClassのバリデーション
                    // バリデーションOKならProductClass.idを取得
                    $productClassId = null;
                    if ($isValid === true) {
                        // バリデーションOKの場合

                        // product_codeで検索できるProductClass一覧を取得 (Product.del_flg=0 かつ ProductClass.del_flg=0のものだけ)
                        $productClassIdArray = $this->getProductClassIdArray($app, $code);

                        // 見つかったProductClass.idが1個でなければ不正 (0個、複数個は不正)
                        if (count($productClassIdArray) == 1) {
                            // 見つかったProductClass.idが1個: OK
                            // ProductClass.idを取得
                            $productClassId = isset($productClassIdArray[0]['product_class_id']) ? $productClassIdArray[0]['product_class_id'] : null;

                        } elseif (count($productClassIdArray) == 0) {
                            // 見つかったProductClass.idが0個: NG
                            $processed = "-2";  // クライアントエラー
                            $isValid   = false;  // エラー
                            $app->log($methodName . 'Stock Update: [エラー] 商品コードからProductClassが見つかりません [CLIENT ERROR][PRODUCT_CLASS IS NOT FOUND]');

                        } elseif (count($productClassIdArray) > 1) {
                            // 見つかったProductClass.idが複数個: NG
                            $processed = "-2";  // クライアントエラー
                            $isValid   = false;  // エラー
                            $app->log($methodName . 'Stock Update: [エラー] 複数のProductClassで商品コードが重複しています [CLIENT ERROR][DUPLICATE PRODUCT_CODE IN PRODUCT_CLASS]');

                        } else {
                            // ここにくることはあり得ないが、ねんのため設置
                            $processed = "-2";  // クライアントエラー
                            $isValid   = false;  // エラー
                            $app->log($methodName . 'Stock Update: [エラー] 商品コードが不正です [CLIENT ERROR][PRODUCT_CODE IS INVALID]');
                        }
                    }

                    // ProductClass.stockのバリデーション
                    // バリデーションOKならProductClassを取得
                    $ProductClass = null;
                    if ($isValid === true && $productClassId !== null) {
                        // バリデーションOKの場合

                        $ProductClass = $app['eccube.repository.product_class']->find($productClassId);
                        if ($ProductClass == null) {
                            // 対象商品が見つからない場合
                            $processed = "-2";  // クライアントエラー
                            $isValid   = false;  // エラー
                            $app->log($methodName . 'Stock Update: [エラー] ProductClassが見つかりません [CLIENT ERROR][PRODUCT_CLASS NOT FOUND]');
                        }
                    }

                    // ProductStock.stockのバリデーション
                    // バリデーションOKならProductStockを取得
                    if ($isValid === true) {
                        // バリデーションOKの場合

                        $ProductStock = null;
                        if ($ProductClass != null) {
                            $ProductStock = $ProductClass->getProductStock();
                        }
                        if ($ProductStock == null) {
                            // 見つからない場合
                            $processed = "-2";  // クライアントエラー
                            $isValid = false;  // エラー
                            $app->log($methodName . 'Stock Update: [エラー] ProductStockが見つかりません [CLIENT ERROR][PRODUCT STOCK NOT FOUND]');
                        }
                    }

                    // ProductClass.stock と ProductStock.stock の更新
                    if ($isValid === true) {
                        // バリデーションOKの場合
                        // ProductClass.stockの更新
                        $ProductClass->setStock($stock);
                        $app['orm.em']->persist($ProductClass);
                        $app['orm.em']->flush();

                        $logMessage .= ' [INFO][PRODUCT_CLASS SET STOCK] ProductClass.id:' . $ProductClass->getId() . ' setStock(' . $stock . ')';

                        // ProductStock.stockの更新
                        $ProductStock->setStock($stock);
                        $app['orm.em']->persist($ProductStock);
                        $app['orm.em']->flush();

                        $logMessage .= ' [INFO][PRODUCT_STOCK SET STOCK] ProductStock.id:' . $ProductStock->getId() . ' setStock(' . $stock . ')';

                        $app->log($methodName . 'Stock Update: [成功] 更新情報 >>' . $logMessage);

                        $processed = "0";  // 成功
                    }
                }
            }

            // コミット
            if ($app['orm.em']->getConnection()->isTransactionActive()) {
                $app['orm.em']->getConnection()->commit();
            }

        } catch (\Exception $e){
            // システムエラー

            $app['orm.em']->getConnection()->rollback();

            $processed       = "-3";  // システムエラー
            $app->log($methodName . 'Stock Update: [エラー] 予期せぬエラー [ERROR][SYSTEM ERROR]');
            $app->log($methodName . '$e->getMessage(): ここから[' . $e->getMessage() . ']ここまで');

        }

        $totalResult = "1";
        $resultNo    = "1";
        $responseXml = $this->createResponce($totalResult, $storeAccount, $code, $stock, $ts, $sig, $resultNo, $processed, $responseMessage);

        $app->log($methodName . 'NEPlugin stock update End');

        return new Response(
            $responseXml,
            Response::HTTP_OK,
            array('content-type' => 'application/xml', 'charset'=> 'EUC-JP')
        );
    }

    // ネクストエンジンへ返すレスポンスの作成
    private function createResponce($totalResult, $storeAccount, $code, $stock, $ts, $sig, $resultNo, $processed, $message)
    {
        $responseString = '';

        $responseString .= '<?xml version="1.0" encoding="EUC-JP"?>';
        $responseString .= '<ShoppingUpdateStock version="1.0">';
        $responseString .=     '<ResultSet TotalResult="'. $totalResult . '">';
        $responseString .=         '<Request>';
        $responseString .=             '<Argument Name="StoreAccount" Value="' . $storeAccount . '" />';
        $responseString .=             '<Argument Name="Code" Value="' . $code . '" />';
        $responseString .=             '<Argument Name="Stock" Value="' . $stock . '" />';
        $responseString .=             '<Argument Name="ts" Value="' . $ts . '" />';
        $responseString .=             '<Argument Name=".sig" Value="' . $sig . '" />';
        $responseString .=         '</Request>';
        $responseString .=         '<Result No="' . $resultNo . '">';
        $responseString .=             '<Processed>' . $processed . '</Processed>';
        $responseString .=         '</Result>';
        /* 最新マニュアルに記載がないためコメントアウト
        if ($message != '') {
            $responseString .= '<Message>' . $message . '</Message>';
        }
        */
        $responseString .=     '</ResultSet>';
        $responseString .= '</ShoppingUpdateStock>';

        return $responseString;
    }


    // 正しいProductClassを取得する
    // [正しいProductClassの条件]
    // ・dtb_product.del_flg = 0であること
    // ・dtb_product_class.del_flg = 0であること
    private function getProductClassIdArray($app, $productCode)
    {
        // SQL
        $sql = 'SELECT pc.product_class_id
                  FROM dtb_product_class AS pc
                 INNER JOIN dtb_product AS p ON p.product_id = pc.product_id
                 WHERE pc.del_flg = 0
                   AND p.del_flg = 0
                   AND pc.product_code = :productCode
                ';
        // パラメータ
        $params = array();
        $params['productCode'] = $productCode;

        // 実行
        return $app['orm.em']->getConnection()->fetchAll($sql, $params);
    }

}
