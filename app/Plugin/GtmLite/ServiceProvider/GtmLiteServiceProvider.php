<?php
/*
 * GtmLite: Google Tag Manager コンテナタグ設置プラグイン
 * Copyright (C) 2017 Freischtide Inc. All Rights Reserved.
 * http://freischtide.tumblr.com/
 *
 * License: see LICENSE.txt
 */

namespace Plugin\GtmLite\ServiceProvider;

use Silex\Application as BaseApplication;
use Silex\ServiceProviderInterface;

class GtmLiteServiceProvider implements ServiceProviderInterface
{
    public function register(BaseApplication $app)
    {
        $app->match('/' . $app['config']['admin_route'] . '/plugin/gtmlite/config', '\\Plugin\\GtmLite\\Controller\\ConfigController::edit')->bind('plugin_GtmLite_config');

        $app['form.types'] = $app->share($app->extend('form.types', function ($types) use ($app) {
            $types[] = new \Plugin\GtmLite\Form\Type\GtmLiteType($app);
            return $types;
        }));

        $app['eccube.plugin.gtmlite.repository.gtmlite'] = $app->share(function () use ($app) {
            return $app['orm.em']->getRepository('Plugin\GtmLite\Entity\GtmLite');
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
