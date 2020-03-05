<?php

/*
 * This file is part of the OrderNumber
 *
 * Copyright (C) 2018 iforcom
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\OrderNumber\ServiceProvider;

use Monolog\Handler\FingersCrossed\ErrorLevelActivationStrategy;
use Monolog\Handler\FingersCrossedHandler;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
use Plugin\OrderNumber\Form\Type\OrderNumberConfigType;
use Silex\Application as BaseApplication;
use Silex\ServiceProviderInterface;

class OrderNumberServiceProvider implements ServiceProviderInterface
{

    public function register(BaseApplication $app)
    {
        // プラグイン用設定画面
        $app->match('/'.$app['config']['admin_route'].'/setting/OrderNumber/config', 'Plugin\OrderNumber\Controller\ConfigController::index')->bind('plugin_OrderNumber_config');

        // Repository
        $app['eccube.plugin.order_number.repository.order_number'] = $app->share(function () use ($app) {
            return $app['orm.em']->getRepository('Plugin\OrderNumber\Entity\OrderNumber');
        });
        $app['eccube.plugin.order_number.repository.order_number_format'] = $app->share(function () use ($app) {
            return $app['orm.em']->getRepository('Plugin\OrderNumber\Entity\OrderNumberFormat');
        });

        // Form
        $app['form.types'] = $app->share($app->extend('form.types', function ($types) use ($app) {
            $types[] = new OrderNumberConfigType();

            return $types;
        }));

        // メニュー登録
        $app['config'] = $app->share($app->extend('config', function ($config) {
            $config['nav'][4]['child'][0]['child'][] = array(
                'id' => "order_number_id",
                'name' => "注文番号設定",
                'url' => 'plugin_OrderNumber_config'
            );
            return $config;
        }));
    }

    public function boot(BaseApplication $app)
    {
    }

}
