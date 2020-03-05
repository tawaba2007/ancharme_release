<?php

/*
 * This file is part of the ApgProductClassImage
 *
 * Copyright (C) 2018 ARCHIPELAGO Inc.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\ApgProductClassImage\ServiceProvider;

use Monolog\Handler\FingersCrossed\ErrorLevelActivationStrategy;
use Monolog\Handler\FingersCrossedHandler;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
use Plugin\ApgProductClassImage\Form\Extension\Admin\ProductClassTypeExtension;
use Plugin\ApgProductClassImage\Form\Type\ApgProductClassImageConfigType;
use Plugin\ApgProductClassImage\Logic\Event\Admin\ProductClassImageClearLogic;
use Plugin\ApgProductClassImage\Logic\Event\Admin\ProductClassImageUploadLogic;
use Plugin\ApgProductClassImage\Logic\Event\Admin\ProductClassInitializeEventLogic;
use Plugin\ApgProductClassImage\Logic\TemplateEvent\Admin\RenderProductClassLogic;
use Plugin\ApgProductClassImage\Logic\TemplateEvent\Front\RenderProductDetailLogic;
use Plugin\ApgProductClassImage\Util\PluginUtil;
use Silex\Application as BaseApplication;
use Silex\ServiceProviderInterface;

class ApgProductClassImageServiceProvider implements ServiceProviderInterface
{

    public function register(BaseApplication $app)
    {
        // プラグイン用設定画面
        $app->match('/' . $app['config']['admin_route'] . '/plugin/ApgProductClassImage/config', 'Plugin\ApgProductClassImage\Controller\ConfigController::index')->bind('plugin_ApgProductClassImage_config');

//        // 独自コントローラ
        $app->post('/plugin/apgproductclassimage/image/add', 'Plugin\ApgProductClassImage\Controller\ApgProductClassImageController::addImage')->bind('plugin_plugin_ApgProductClassImage_addImage');


        // Form
        $app['form.types'] = $app->share($app->extend('form.types', function ($types) use ($app) {
            $types[] = new ApgProductClassImageConfigType();

            return $types;
        }));
        // FormExtension
        $app['form.type.extensions'] = $app->share($app->extend('form.type.extensions', function ($types) use ($app) {
            $types[] = new ProductClassTypeExtension();
            return $types;
        }));


        // Repository
        define('APGPRODUCTCLASSIMAGE_REPOSITORY_PRODUCT_CLASS_IMAGE', PluginUtil::repositoryName('product_class_image'));
        $app[APGPRODUCTCLASSIMAGE_REPOSITORY_PRODUCT_CLASS_IMAGE] = $app->share(function () use ($app) {
            return $app['orm.em']->getRepository('Plugin\ApgProductClassImage\Entity\ProductClassImage');
        });
        define('APGPRODUCTCLASSIMAGE_REPOSITORY_PRODUCT_CLASS_IMAGE_SETTING', PluginUtil::repositoryName('product_class_image_setting'));
        $app[APGPRODUCTCLASSIMAGE_REPOSITORY_PRODUCT_CLASS_IMAGE_SETTING] = $app->share(function () use ($app) {
            return $app['orm.em']->getRepository('Plugin\ApgProductClassImage\Entity\ProductClassImageSetting');
        });


        // Logic
        define('APGPRODUCTCLASSIMAGE_LOGIC_ADMIN_PRODUCT_CLASS_INITIALIZE', PluginUtil::logicName('Event.Admin.ProductClassInitializeLogic'));
        $app[APGPRODUCTCLASSIMAGE_LOGIC_ADMIN_PRODUCT_CLASS_INITIALIZE] = $app->share(
            function () use ($app) {
                return new ProductClassInitializeEventLogic($app);
            }
        );
        define('APGPRODUCTCLASSIMAGE_LOGIC_ADMIN_PRODUCT_CLASS_RENDER', PluginUtil::logicName('TemplateEvent.Admin.ProductClassInitializeLogic'));
        $app[APGPRODUCTCLASSIMAGE_LOGIC_ADMIN_PRODUCT_CLASS_RENDER] = $app->share(
            function () use ($app) {
                return new RenderProductClassLogic($app);
            }
        );
        define('APGPRODUCTCLASSIMAGE_LOGIC_ADMIN_PRODUCT_CLASS_IMAGE_UPLOAD', PluginUtil::logicName('Event.Admin.ProductClassImageUpload'));
        $app[APGPRODUCTCLASSIMAGE_LOGIC_ADMIN_PRODUCT_CLASS_IMAGE_UPLOAD] = $app->share(
            function () use ($app) {
                return new ProductClassImageUploadLogic($app);
            }
        );
        define('APGPRODUCTCLASSIMAGE_LOGIC_ADMIN_PRODUCT_CLASS_IMAGE_CLEAR', PluginUtil::logicName('Event.Admin.ProductClassImageClear'));
        $app[APGPRODUCTCLASSIMAGE_LOGIC_ADMIN_PRODUCT_CLASS_IMAGE_CLEAR] = $app->share(
            function () use ($app) {
                return new ProductClassImageClearLogic($app);
            }
        );
        define('APGPRODUCTCLASSIMAGE_LOGIC_FRONT_PRODUCT_DETAIL_RENDER', PluginUtil::logicName('TemplateEvent.Front.ProductDetailLogic'));
        $app[APGPRODUCTCLASSIMAGE_LOGIC_FRONT_PRODUCT_DETAIL_RENDER] = $app->share(
            function () use ($app) {
                return new RenderProductDetailLogic($app);
            }
        );

        // locale
        $file = __DIR__ . '/../Resource/locale/message.' . $app['locale'] . '.yml';
        $app['translator']->addResource('yaml', $file, $app['locale']);


        // ログファイル設定
        $app['monolog.logger.apgproductclassimage'] = $app->share(function ($app) {

            $logger = new $app['monolog.logger.class']('apgproductclassimage');

            $filename = $app['config']['root_dir'] . '/app/log/apgproductclassimage.log';
            $RotateHandler = new RotatingFileHandler($filename, $app['config']['log']['max_files'], Logger::INFO);
            $RotateHandler->setFilenameFormat(
                'apgproductclassimage_{date}',
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
