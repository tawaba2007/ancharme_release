<?php



namespace Plugin\NEConnect\ServiceProvider;

use Eccube\Application;
use Silex\Application as BaseApplication;
use Silex\ServiceProviderInterface;

class NEConnectServiceProvider implements ServiceProviderInterface
{
    public function register(BaseApplication $app)
    {
        // $app登録
        $app['plg.neconnect.repository.neconnect_config'] = $app->share(function () use ($app) {
            return $app['orm.em']->getRepository('Plugin\NEConnect\Entity\NEConnectConfig');
        });
        $app['plg.neconnect.repository.neconnect_mail_history'] = $app->share(function () use ($app) {
            return $app['orm.em']->getRepository('Plugin\NEConnect\Entity\NEConnectMailHistory');
        });


        // ルーティング登録
        $app->match('/'.$app['config']['admin_route'].'/plugin/NEConnect/config', '\Plugin\NEConnect\Controller\Admin\ConfigController::index' )
            ->bind('plugin_NEConnect_config');
        $app->match('/'.$app['config']['admin_route'].'/plugin/NEConnect/config/mail/{id}/edit', '\Plugin\NEConnect\Controller\Admin\ConfigController::mailEdit' )
            ->assert('id', '\d+')->bind('plugin_NEConnect_mail_edit');
        // ネクストエンジンAPI
        $app->match('/update_stock', '\Plugin\NEConnect\Controller\NEConnectController::updateStock');


        // FormType登録
        $app['form.types'] = $app->share($app->extend('form.types', function ($types) use ($app) {
            $types[] = new \Plugin\NEConnect\Form\Type\Admin\NEConnectConfigType($app);
            return $types;
        }));
        $app['form.types'] = $app->share($app->extend('form.types', function ($types) use ($app) {
            $types[] = new \Plugin\NEConnect\Form\Type\Admin\NEConnectMailEditType($app);
            return $types;
        }));

    }

    public function boot(BaseApplication $app)
    {
    }
}
