<?php

/*
 * This file is part of the BreadcrumbList3
 *
 * Copyright (C) 2016 Nobuhiko Kimoto
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\BreadcrumbList3\ServiceProvider;

use Eccube\Application;
use Monolog\Handler\FingersCrossed\ErrorLevelActivationStrategy;
use Monolog\Handler\FingersCrossedHandler;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
use Plugin\BreadcrumbList3\Form\Type\BreadcrumbList3ConfigType;
use Silex\Application as BaseApplication;
use Silex\ServiceProviderInterface;
use Symfony\Component\Yaml\Yaml;


class BreadcrumbList3ServiceProvider implements ServiceProviderInterface
{
    public function register(BaseApplication $app)
    {
        // ブロック
        $app->match('/block/breadcrumbList_block', '\Plugin\BreadcrumbList3\Controller\Block\BreadcrumbList3Controller::index')
            ->bind('block_breadcrumbList_block');

        // サービスの登録
        //$app['eccube.plugin.recommend.service.recommendify3'] = $app->share(function () use ($app) {
        //    return new \Plugin\Recommendify3\Service\Recommendify3Service($app);
        //});

        // // メッセージ登録
        // $app['translator'] = $app->share($app->extend('translator', function ($translator, \Silex\Application $app) {
        //     $translator->addLoader('yaml', new \Symfony\Component\Translation\Loader\YamlFileLoader());
        //     $file = __DIR__ . '/../Resource/locale/message.' . $app['locale'] . '.yml';
        //     if (file_exists($file)) {
        //         $translator->addResource('yaml', $file, $app['locale']);
        //     }
        //     return $translator;
        // }));

        // load config
        // $conf = $app['config'];
        // $app['config'] = $app->share(function () use ($conf) {
        //     $confarray = array();
        //     $path_file = __DIR__ . '/../Resource/config/path.yml';
        //     if (file_exists($path_file)) {
        //         $config_yml = Yaml::parse(file_get_contents($path_file));
        //         if (isset($config_yml)) {
        //             $confarray = array_replace_recursive($confarray, $config_yml);
        //         }
        //     }

        //     $constant_file = __DIR__ . '/../Resource/config/constant.yml';
        //     if (file_exists($constant_file)) {
        //         $config_yml = Yaml::parse(file_get_contents($constant_file));
        //         if (isset($config_yml)) {
        //             $confarray = array_replace_recursive($confarray, $config_yml);
        //         }
        //     }

        //     return array_replace_recursive($conf, $confarray);
        // });

        // ログファイル設定
        $app['monolog.BreadcrumbList3'] = $app->share(function ($app) {

            $logger = new $app['monolog.logger.class']('plugin.BreadcrumbList3');

            $file = $app['config']['root_dir'] . '/app/log/BreadcrumbList3.log';
            $RotateHandler = new RotatingFileHandler($file, $app['config']['log']['max_files'], Logger::INFO);
            $RotateHandler->setFilenameFormat(
                'BreadcrumbList3_{date}',
                'Y-m-d'
            );

            $logger->pushHandler(
                new FingersCrossedHandler(
                    $RotateHandler,
                    new ErrorLevelActivationStrategy(Logger::INFO)
                )
            );

            return $logger;
        });

    }

    public function boot(BaseApplication $app)
    {
    }
}
