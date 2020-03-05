<?php



namespace Plugin\SortProduct\ServiceProvider;

use Eccube\Application;
use Silex\Application as BaseApplication;
use Silex\ServiceProviderInterface;

class SortProductServiceProvider implements ServiceProviderInterface
{
    public function register(BaseApplication $app)
    {
        // ----------
        // 定義
        //
        define('TITLE','商品管理');  // 管理画面のタイトル
        define('SUBTITLE','商品並び替え');  // 管理画面の副タイトル



        // ----------
        // ルーティング登録
        //

        // カテゴリーのメニューを表示する（search_productからrenderで呼ばれる）
        // コンフィグ画面
        $app->match('/'.$app['config']['admin_route'].'/plugin/SortProduct/config',
            '\Plugin\SortProduct\Controller\Admin\ConfigController::index' )
            ->bind('plugin_SortProduct_config');
        // 並び替え設定画面
        $app->match('/'.$app['config']['admin_route'].'/plugin/SortProduct/',
            '\Plugin\SortProduct\Controller\Admin\SortProductController::index' )
            ->bind('plugin_SortProduct');
//        $app->match('/'.$app['config']['admin_route'].'/plugin/SortProduct/{categoryId}',
//            '\Plugin\SortProduct\Controller\Admin\SortProductController::index' )
//            ->bind('plugin_SortProduct_byCategory')
//            ->assert('categoryId', '\d+');
        $app->match('/'.$app['config']['admin_route'].'/plugin/SortProduct/category/{categoryId}',
//            '\Plugin\SortProduct\Controller\Admin\SortProductController::indexCategory' )
            '\Plugin\SortProduct\Controller\Admin\SortProductController::index' )
            ->bind('plugin_SortProduct_byCategory')
            ->assert('categoryId', '\d+');

        // Ajax
        $app->post('/'.$app['config']['admin_route'].'/plugin/SortProduct/rank/move',
            '\Plugin\SortProduct\Controller\Admin\SortProductController::moveRank')
            ->bind('plg_SortProduct_product_rank_move');
        $app->post('/'.$app['config']['admin_route'].'/plugin/SortProduct/category/rank/move',
            '\Plugin\SortProduct\Controller\Admin\SortProductController::moveRankCategory')
            ->bind('plg_SortProduct_product_rank_move_category');

        // カテゴリーツリーの埋め込み
        $app->match('/plugin/SortProduct/block/CategoryTreeBlock/{categoryId}',
            '\Plugin\SortProduct\Controller\Admin\Block\CategoryTreeBlockController::index' )
            ->bind('plugin_SortProduct_block_category_tree')
            ->assert('categoryId', '\d+');

        // app登録
        $app['plg.sort_product.repository.sort_product'] = $app->share(function () use ($app) {
            return $app['orm.em']->getRepository('\Plugin\SortProduct\Entity\SortProduct');
        });
        $app['plg.sort_product.repository.sort_product_category'] = $app->share(function () use ($app) {
            return $app['orm.em']->getRepository('\Plugin\SortProduct\Entity\SortProductCategory');
        });
        $app['plg.sort_product.repository.sort_product_config'] = $app->share(function () use ($app) {
            return $app['orm.em']->getRepository('\Plugin\SortProduct\Entity\SortProductConfig');
        });

        // FormType登録
        $app['form.types'] = $app->share($app->extend('form.types', function ($types) use ($app) {
            $types[] = new \Plugin\SortProduct\Form\Type\Admin\ConfigType($app);
            $types[] = new \Plugin\SortProduct\Form\Type\Admin\ChangeRankType($app);
            $types[] = new \Plugin\SortProduct\Form\Type\Admin\ChangeRankCategoryType($app);

            return $types;
        }));

        // ----------
        // 管理画面のメニュー
        //
        // [商品管理]にメニューを追加 商品管理はデフォルトの[0]番と想定している
        $app['config'] = $app->share( $app->extend('config', function ($config) {
            $config['nav'][0]['child'][] = array( 'id' => 'sort_product', 'name' => '商品並び替え', 'url' => 'plugin_SortProduct' );

            return $config;
        }));




    }

    public function boot(BaseApplication $app)
    {
    }
}
