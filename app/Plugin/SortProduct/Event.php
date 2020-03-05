<?php



namespace Plugin\SortProduct;

use Eccube\Application;
use Eccube\Common\Constant;
use Eccube\Entity\Category;
use Eccube\Event\EventArgs;
use Eccube\Event\TemplateEvent;
use Plugin\SortProduct\Util\CommonMethodCategory;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\Event\PostResponseEvent;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpFoundation\Response;

use Eccube\Entity\Master\ProductListOrderBy;
use Plugin\SortProduct\Entity\SortProduct;
use Plugin\SortProduct\Util\CommonMethod;

class Event
{

    /** @var \Eccube\Application $app */
    private $app;
    private $sessionDataNameDql   = 'plg_SortProduct_dql';  // セッションに保存するDQLデータの名前
    private $sessionDataNameParam = 'plg_SortProduct_param';  // セッションに保存するパラメータの名前

    public function __construct($app)
    {
        $this->app = $app;
    }


    public function sortProduct(TemplateEvent $event)
    {
        $app = $this->app;
        $parameters = $event->getParameters();


        // セッションからDQL取得（DQLはsetDQL()でセットしたもの）
        // （後で、現在設定されているqbから商品リストを取得する（paginationからは該当ページの商品しか取得できないため））
        // 本値を使用するかどうかはさておき、unsetしたいので必ず実行する
        if(isset($_SESSION[$this->sessionDataNameDql])){
            $dql = $_SESSION[$this->sessionDataNameDql];
            unset($_SESSION[$this->sessionDataNameDql]);
        } else {
            $dql = null;
        }

        // セッションからDDLのパラメータ取得
        if(isset($_SESSION[$this->sessionDataNameParam])){
            $dqlParamsSerialized = $_SESSION[$this->sessionDataNameParam];
            $dqlParams = unserialize($dqlParamsSerialized);
            unset($_SESSION[$this->sessionDataNameParam]);
        } else {
            $parameters = null;
        }

        // 表示順の指定が[おすすめ順]の場合は並び替えを行う
        //   表示順の指定が[おすすめ順]かどうかを確認
        //     [おすすめ順]のIDを取得
        //       テーブルにない場合（プラグイン無効時など）はnullになる
        $targetOrderId = $this->getOrderIdFromName('おすすめ順');  // おすすめ順のIDを取得

        if($targetOrderId!==null) {  // 表示順がうまく動作している場合のみ並び替える

            //   表示順の指定を確認 [searchForm]から取得
            // get [search_form]
            $searchForm = isset($parameters['search_form']) ? $parameters['search_form'] : null;
            // get [orderby]
            $searchForm_orderBy = isset($searchForm['orderby']) ? $searchForm['orderby'] : null;
            // get [orderby]-[value]
            $value_searchForm_orderBy = isset($searchForm_orderBy->vars['value']) ? $searchForm_orderBy->vars['value'] : null;

            // get [category]
            $searchForm_category_id = isset($searchForm['category_id']) ? $searchForm['category_id'] : null;
            $TargetCategory = isset($searchForm_category_id->vars['data']) ? $searchForm_category_id->vars['data'] : null;


            if ($targetOrderId !== null && ($value_searchForm_orderBy == $targetOrderId || $value_searchForm_orderBy === null)) {
                // プラグイン無効時は処理しない（無効時は$targetOrderId==nullになる）
                // 指定の表示順が[おすすめ順]だった場合、[おすすめ順]でソートする ($value_searchForm_orderBy == $targetOrderId)
                // または、表示順の指定がない場合も、[おすすめ順]でソートする ($value_searchForm_orderBy === null)

                // 現在設定されているqbから商品リストを取得しなおす（paginationからは該当ページの商品しか取得できないため）
                if($dql !== null) {
                    $query = $app['orm.em']->createQuery($dql);
                    $query->setParameters($dqlParams);
                    $origin_productIds = $query->getResult();
                } else {
                    $query = null;
                    $origin_productIds = null;
                }

                // 商品リストが取得できた場合のみ並び替えを実施する
                if($origin_productIds !== null && count($origin_productIds) > 0) {

                    // 動作設定の取得
                    $SortProductConfig = $app['plg.sort_product.repository.sort_product_config']->createQueryBuilder('c')->addOrderBy('c.update_date', 'DESC')->setMaxResults(1)->getQuery()->getOneOrNullResult();

                    if ($TargetCategory === null || $SortProductConfig == null || $SortProductConfig->getCategoryMode() == \Eccube\Common\Constant::DISABLED) {
                        // カテゴリー指定がない場合 or コンフィグ設定がない場合 or カテゴリー別並び替えが無効の場合: 従来の動き

                        // 全商品対象に、rank設定されていない商品がないか確認しあればrankを設定する
                        CommonMethod::setNewRank();

                        // 対象となる商品ID一覧を取得する
                        $productIds = array();
                        foreach ($origin_productIds as $origin_productId) {
                            $productIds[] = $origin_productId["id"];
                        }

                        // 対象商品のID一覧をrankでソートする
                        $productIdsOrderByRank = $app['orm.em']->getRepository('Plugin\SortProduct\Entity\SortProduct')
                            ->getProductIdOrderByRank($productIds);

                        // pagination再構築
                        //   現在のpaginationの値を取得（現在のページ、ページに表示する商品数は再利用するため）
                        $parameters        = $event->getParameters();
                        $pagination        = isset($parameters['pagination']) ? $parameters['pagination'] : null;
                        $currentPageNumber = $pagination->getCurrentPageNumber();  // 現在のページ
                        $numItemsPerPage   = $pagination->getItemNumberPerPage();    // 現在のページに表示する商品数
                        //   現在のページに表示する商品一覧の作成
                        $products     = array();
                        $isRedundancy = array();  // 商品コードの重複排除チェック $productsへ格納済みの商品はtrueで記録する
                        foreach ($productIdsOrderByRank as $productIdOrderByRank) {
                            $Product = $app['eccube.repository.product']->findOneBy(array("id" => $productIdOrderByRank["product_id"]));
                            // 重複していない商品のみ[$products]へ格納する
                            if (!isset($isRedundancy[$Product->getId()])) {
                                $products[] = $Product;
                                $isRedundancy[$Product->getId()] = true;
                            }
                        }

                        //   pagination再構築
                        $new_pagination = $app['paginator']()->paginate(
                            $products,
                            $currentPageNumber,
                            $numItemsPerPage
                        );

                        // 戻り値
                        $parameters['pagination'] = $new_pagination;
                        $event->setParameters($parameters);

                    } else {
                        // カテゴリー指定がある場合: カテゴリー別並び替えを行う

                        // カテゴリから外された商品のランクを削除する
                        // カテゴリ別の場合のみ実施する
                        CommonMethodCategory::deleteRank($TargetCategory);

                        // 全商品対象に、rank設定されていない商品がないか確認しあればrankを設定する
                        CommonMethodCategory::setNewRank($TargetCategory);


                        // 対象となる商品ID一覧を取得する
                        $productIds = array();
                        foreach ($origin_productIds as $origin_productId) {
                            $productIds[] = $origin_productId["id"];
                        }

                        // 対象商品のID一覧をrankでソートする
                        $productIdsOrderByRank = $app['orm.em']->getRepository('Plugin\SortProduct\Entity\SortProductCategory')
                            ->getProductIdOrderByRank($TargetCategory, $productIds);

                        // pagination再構築
                        //   現在のpaginationの値を取得（現在のページ、ページに表示する商品数は再利用するため）
                        $parameters        = $event->getParameters();
                        $pagination        = isset($parameters['pagination']) ? $parameters['pagination'] : null;
                        $currentPageNumber = $pagination->getCurrentPageNumber();  // 現在のページ
                        $numItemsPerPage   = $pagination->getItemNumberPerPage();    // 現在のページに表示する商品数
                        //   現在のページに表示する商品一覧の作成
                        $products     = array();
                        $isRedundancy = array();  // 商品コードの重複排除チェック $productsへ格納済みの商品はtrueで記録する
                        foreach ($productIdsOrderByRank as $productIdOrderByRank) {
                            $Product = $app['eccube.repository.product']->findOneBy(array("id" => $productIdOrderByRank["product_id"]));
                            // 重複していない商品のみ[$products]へ格納する
                            if (!isset($isRedundancy[$Product->getId()])) {
                                $products[] = $Product;
                                $isRedundancy[$Product->getId()] = true;
                            }
                        }

                        //   pagination再構築
                        $new_pagination = $app['paginator']()->paginate(
                            $products,
                            $currentPageNumber,
                            $numItemsPerPage
                        );

                        // 戻り値
                        $parameters['pagination'] = $new_pagination;
                        $event->setParameters($parameters);
                    }

                } else {
                    // DQLから商品リストが取得できない場合は、なにもしない
                }
            } else {
                // 表示順の設定がない or [おすすめ順]以外が指定されている場合は、なにもしない
            }
        } else {
            // 表示順の動作がおかしい場合は、なにもしない
        }

    }


    // 表示順リストの[おすすめ順]のIDを取得
    // [mtb_product_list_order_by]テーブルから取得する
    public function getOrderIdFromName($targetName)
    {
        $app = $this->app;

        $targetRepository = $app['orm.em']->getRepository('Eccube\Entity\Master\ProductListOrderBy');
        $targetRecord = $targetRepository->findOneBy(array('name' => $targetName));

        if($targetRecord != null){
            return $targetRecord->getId();
        } else {
            return null;
        }

    }


    // setDQL
    //   $qbからDQLを取得し、セッションに保管する
    //   （保管されたDQLは、あとで SortProduct()で使用する）
    public function setDQL(EventArgs $event)
    {
        $qb = $event->getArgument('qb');
        $qb2 = clone $qb;
        $qb2->Select('p.id');  // 商品IDのみ取得するようにSelectを強制上書き

        // DQLのセッション保存
        //   DQL取得

        $dql = $qb2->getDql();  // DQL取得
        //$debugMessage['$dql']=$dql;
        //   DQLのセッション保存
        if(isset($_SESSION[$this->sessionDataNameDql])){
            unset($_SESSION[$this->sessionDataNameDql]);
        }
        $_SESSION[$this->sessionDataNameDql] = $dql;


        // parametersのセッション保存
        //   parameters取得
        $parameters = $qb2->getParameters();  // パラメータ取得
        //$debugMessage['$parameters']=$parameters;
        $parametersSerialized = serialize($parameters);  // ArrayCollectionなのでシリアル化
        if(isset($_SESSION[$this->sessionDataNameParam])){
            unset($_SESSION[$this->sessionDataNameParam]);
        }
        $_SESSION[$this->sessionDataNameParam] = $parametersSerialized;
    }

}



