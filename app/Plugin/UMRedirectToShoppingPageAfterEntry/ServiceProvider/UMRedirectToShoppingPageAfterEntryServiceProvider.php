<?php

/*
 * This file is part of the UMRedirectToShoppingPageAfterEntry
 *
 * Copyright (C) 2018 U-Mebius Inc.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\UMRedirectToShoppingPageAfterEntry\ServiceProvider;

use Monolog\Handler\FingersCrossed\ErrorLevelActivationStrategy;
use Monolog\Handler\FingersCrossedHandler;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
use Plugin\UMRedirectToShoppingPageAfterEntry\Form\Type\UMRedirectToShoppingPageAfterEntryConfigType;
use Plugin\UMRedirectToShoppingPageAfterEntry\Service\TwigService;
use Silex\Application as BaseApplication;
use Silex\ServiceProviderInterface;

class UMRedirectToShoppingPageAfterEntryServiceProvider implements ServiceProviderInterface
{

    public function register(BaseApplication $app)
    {
        // プラグイン用設定画面
//        $app->match('/'.$app['config']['admin_route'].'/plugin/UMRedirectToShoppingPageAfterEntry/config', 'Plugin\UMRedirectToShoppingPageAfterEntry\Controller\ConfigController::index')->bind('plugin_UMRedirectToShoppingPageAfterEntry_config');
        // Service
        $app['plugin.umebius.service.twig'] = $app->share(function () use ($app) {
            return new TwigService($app);
        });

        // Form
//        $app['form.types'] = $app->share($app->extend('form.types', function ($types) use ($app) {
//            $types[] = new UMRedirectToShoppingPageAfterEntryConfigType();
//
//            return $types;
//        }));


    }

    public function boot(BaseApplication $app)
    {
    }

}
