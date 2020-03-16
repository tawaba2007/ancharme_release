<?php

namespace Plugin\GoqsmilePlugin\ServiceProvider;

use Monolog\Handler\FingersCrossed\ErrorLevelActivationStrategy;
use Monolog\Handler\FingersCrossedHandler;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
use Plugin\GoqsmilePlugin\Form\Type\GoqsmilePluginConfigType;
use Silex\Application as BaseApplication;
use Silex\ServiceProviderInterface;

class GoqsmilePluginServiceProvider implements ServiceProviderInterface
{

    public function register(BaseApplication $app)
    {
        // プラグイン用設定画面
        $app->match('/'.$app['config']['admin_route'].'/plugin/GoqsmilePlugin/config', 'Plugin\GoqsmilePlugin\Controller\ConfigController::index')->bind('plugin_GoqsmilePlugin_config');

        // Form
        $app['form.types'] = $app->share($app->extend('form.types', function ($types) use ($app) {
            $types[] = new GoqsmilePluginConfigType();

            return $types;
        }));

        // Repository

        // Service

        // メッセージ登録
        // $file = __DIR__ . '/../Resource/locale/message.' . $app['locale'] . '.yml';
        // $app['translator']->addResource('yaml', $file, $app['locale']);

        // load config
        // プラグイン独自の定数はconfig.ymlの「const」パラメータに対して定義し、$app['GoqsmilePluginconfig']['定数名']で利用可能
        // if (isset($app['config']['GoqsmilePlugin']['const'])) {
        //     $config = $app['config'];
        //     $app['GoqsmilePluginconfig'] = $app->share(function () use ($config) {
        //         return $config['GoqsmilePlugin']['const'];
        //     });
        // }

        // ログファイル設定
        $app['monolog.logger.GoqsmilePlugin'] = $app->share(function ($app) {

            $logger = new $app['monolog.logger.class']('GoqsmilePlugin');

            $filename = $app['config']['root_dir'].'/app/log/GoqsmilePlugin.log';
            $RotateHandler = new RotatingFileHandler($filename, $app['config']['log']['max_files'], Logger::INFO);
            $RotateHandler->setFilenameFormat(
                'GoqsmilePlugin_{date}',
                'Y-m-d'
            );

            $logger->pushHandler(
                new FingersCrossedHandler(
                    $RotateHandler,
                    new ErrorLevelActivationStrategy(Logger::ERROR),
                    0,
                    true,
                    true,
                    Logger::INFO
                )
            );

            return $logger;
        });

    }

    public function boot(BaseApplication $app)
    {
    }

}
