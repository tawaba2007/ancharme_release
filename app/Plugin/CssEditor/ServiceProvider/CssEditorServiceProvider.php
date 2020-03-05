<?php

namespace Plugin\CssEditor\ServiceProvider;

use Eccube\Application;
use Plugin\CssEditor\Form\Type\CssEditorType;
use Silex\Application as BaseApplication;
use Silex\ServiceProviderInterface;

class CssEditorServiceProvider implements ServiceProviderInterface
{
    public function register(BaseApplication $app)
    {
        $app['eccube.plugin.repository.css_history'] = $app->share(function () use ($app) {
            return $app['orm.em']->getRepository('Plugin\CssEditor\Entity\CssEditor');
        });
        
        // FormType
        $app['form.types'] = $app->share($app->extend('form.types', function ($types) use ($app) {
            $types[] = new CssEditorType($app);
            return $types;
        }));
        
        // routing
        $app->match('/'.$app['config']['admin_route'].'/CssEditor', '\Plugin\CssEditor\Controller\CssEditorController::index')
        ->bind('admin_CssEditor');
        $app->delete('/'.$app['config']['admin_route'].'/CssEditor/{id}/delete', '\Plugin\CssEditor\Controller\CssEditorController::delete')
        ->value('id', null)->assert('id', '\d+|')
        ->bind('admin_CssEditor_delete');
        $app->match('/'.$app['config']['admin_route'].'/CssEditor/update', '\Plugin\CssEditor\Controller\CssEditorController::update')
        ->bind('admin_CssEditor_update');


        // Config
        $app['config'] = $app->share($app->extend('config', function ($config) {
            // menu bar
            $addNavi['id'] = 'admin_CssEditor';
            $addNavi['name'] = 'CSS管理';
            $addNavi['url'] = 'admin_CssEditor';
            $nav = $config['nav'];
            foreach ($nav as $key => $val) {
                if ('content' == $val['id']) {
                    $nav[$key]['child'][] = $addNavi;
                }
            }
            $config['nav'] = $nav;
			return $config;
		})); 
    }

    public function boot(BaseApplication $app)
    {
    }
}