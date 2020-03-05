<?php
/*
 * UaGaEEc: Google Analytics eコマース/拡張eコマース対応プラグイン
 * Copyright (C) 2016-2017 Freischtide Inc. All Rights Reserved.
 * http://freischtide.tumblr.com/
 *
 * License: see LICENSE.txt
 */

namespace Plugin\UaGaEEc\ServiceProvider;

use Silex\Application as BaseApplication;
use Silex\ServiceProviderInterface;

class UaGaEEcServiceProvider implements ServiceProviderInterface
{
    public function register(BaseApplication $app)
    {
        $app->match('/' . $app['config']['admin_route'] . '/plugin/uagaeec/config', '\\Plugin\\UaGaEEc\\Controller\\ConfigController::edit')->bind('plugin_UaGaEEc_config');

        $app['form.types'] = $app->share($app->extend('form.types', function ($types) use ($app) {
            $types[] = new \Plugin\UaGaEEc\Form\Type\UaGaEEcType($app);
            return $types;
        }));

        $app['eccube.plugin.uagaeec.repository.uagaeec'] = $app->share(function () use ($app) {
            return $app['orm.em']->getRepository('Plugin\UaGaEEc\Entity\UaGaEEc');
        });

        $app['translator'] = $app->share($app->extend('translator', function ($translator, \Silex\Application $app) {
            $translator->addLoader('yaml', new \Symfony\Component\Translation\Loader\YamlFileLoader());
            $file = __DIR__ . '/../Resource/locale/message.' . $app['locale'] . '.yml';
            if (file_exists($file)) {
                $translator->addResource('yaml', $file, $app['locale']);
            }
            return $translator;
        }));
    }

    public function boot(BaseApplication $app)
    {
    }
}
