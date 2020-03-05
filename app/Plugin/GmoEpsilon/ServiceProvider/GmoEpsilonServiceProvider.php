<?php

namespace Plugin\GmoEpsilon\ServiceProvider;

use Eccube\Common\Constant;
use Monolog\Handler\FingersCrossed\ErrorLevelActivationStrategy;
use Monolog\Handler\FingersCrossedHandler;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
use Silex\Application as BaseApplication;
use Silex\ServiceProviderInterface;

class GmoEpsilonServiceProvider implements ServiceProviderInterface
{

    public function register(BaseApplication $app) {
        // Setting
        $app->match('/' . $app["config"]["admin_route"] . '/plugin/GmoEpsilon/config', '\\Plugin\\GmoEpsilon\\Controller\\ConfigController::index')->bind('plugin_GmoEpsilon_config');

        // Epsilon payment
        $app->match('/shopping/epsilon_payment', '\\Plugin\\GmoEpsilon\\Controller\\PaymentController::index')->bind('epsilon_shopping_payment');
        $app->match('/shopping/epsilon_payment/back', '\\Plugin\\GmoEpsilon\\Controller\\PaymentController::back')->bind('epsilon_shopping_payment_back');
        $app->match('/shopping/epsilon_payment/complete', '\\Plugin\\GmoEpsilon\\Controller\\PaymentController::complete')->bind('epsilon_shopping_payment_complete');

        // Regular order
        $app->match('/' . $app["config"]["admin_route"] . '/epsilon_regular_order', '\\Plugin\\GmoEpsilon\\Controller\\Admin\\Order\\RegularOrderController::index')->bind('epsilon_regular_order');
        $app->match('/' . $app["config"]["admin_route"] . '/epsilon_regular_order/page/{page_no}', '\\Plugin\\GmoEpsilon\\Controller\\Admin\\Order\\RegularOrderController::index')->assert('page_no', '\d+')->bind('epsilon_regular_order_page');
        $app->match('/' . $app["config"]["admin_route"] . '/epsilon_regular_order/add', '\\Plugin\\GmoEpsilon\\Controller\\Admin\\Order\\RegularOrderController::add')->bind('epsilon_regular_order_add');
        $app->match('/' . $app["config"]["admin_route"] . '/epsilon_regular_order/{id}/delete', '\\Plugin\\GmoEpsilon\\Controller\\Admin\\Order\\RegularOrderController::delete')->bind('epsilon_regular_order_delete');
        $app->match('/' . $app["config"]["admin_route"] . '/epsilon_regular_order/{id}/edit', '\\Plugin\\GmoEpsilon\\Controller\\Admin\\Order\\RegularEditController::index')->bind('epsilon_regular_order_edit');
        $app->match('/' . $app["config"]["admin_route"] . '/epsilon_regular_order/search/product', '\\Plugin\\GmoEpsilon\\Controller\\Admin\\Order\\RegularEditController::searchProduct')->bind('epsilon_regular_order_search_product');

        // Service
        $app['eccube.plugin.epsilon.service.base'] = $app->share(function () use ($app) {
            return new \Plugin\GmoEpsilon\Service\Client\GmoEpsilon_Base($app);
        });
        $app['eccube.plugin.epsilon.service.credit'] = $app->share(function () use ($app) {
            return new \Plugin\GmoEpsilon\Service\Client\GmoEpsilon_Credit($app);
        });
        $app['eccube.plugin.epsilon.service.reg_credit'] = $app->share(function () use ($app) {
            return new \Plugin\GmoEpsilon\Service\Client\GmoEpsilon_Reg_Credit($app);
        });
        $app['eccube.plugin.epsilon.service.convenience'] = $app->share(function () use ($app) {
            return new \Plugin\GmoEpsilon\Service\Client\GmoEpsilon_Convenience($app);
        });
        $app['eccube.plugin.epsilon.service.netbank_jnb'] = $app->share(function () use ($app) {
            return new \Plugin\GmoEpsilon\Service\Client\GmoEpsilon_Netbank_Jnb($app);
        });
        $app['eccube.plugin.epsilon.service.netbank_rakuten'] = $app->share(function () use ($app) {
            return new \Plugin\GmoEpsilon\Service\Client\GmoEpsilon_Netbank_Rakuten($app);
        });
        $app['eccube.plugin.epsilon.service.sumishin'] = $app->share(function () use ($app) {
            return new \Plugin\GmoEpsilon\Service\Client\GmoEpsilon_Sumishin($app);
        });
        $app['eccube.plugin.epsilon.service.payeasy'] = $app->share(function () use ($app) {
            return new \Plugin\GmoEpsilon\Service\Client\GmoEpsilon_Payeasy($app);
        });
        $app['eccube.plugin.epsilon.service.webmoney'] = $app->share(function () use ($app) {
            return new \Plugin\GmoEpsilon\Service\Client\GmoEpsilon_Webmoney($app);
        });
        $app['eccube.plugin.epsilon.service.ywallet'] = $app->share(function () use ($app) {
            return new \Plugin\GmoEpsilon\Service\Client\GmoEpsilon_Ywallet($app);
        });
        $app['eccube.plugin.epsilon.service.paypal'] = $app->share(function () use ($app) {
            return new \Plugin\GmoEpsilon\Service\Client\GmoEpsilon_Paypal($app);
        });
        $app['eccube.plugin.epsilon.service.bitcash'] = $app->share(function () use ($app) {
            return new \Plugin\GmoEpsilon\Service\Client\GmoEpsilon_Bitcash($app);
        });
        $app['eccube.plugin.epsilon.service.chocom'] = $app->share(function () use ($app) {
            return new \Plugin\GmoEpsilon\Service\Client\GmoEpsilon_Chocom($app);
        });
        $app['eccube.plugin.epsilon.service.sphone'] = $app->share(function () use ($app) {
            return new \Plugin\GmoEpsilon\Service\Client\GmoEpsilon_Sphone($app);
        });
        $app['eccube.plugin.epsilon.service.jcb'] = $app->share(function () use ($app) {
            return new \Plugin\GmoEpsilon\Service\Client\GmoEpsilon_Jcb($app);
        });
        $app['eccube.plugin.epsilon.service.deferred'] = $app->share(function () use ($app) {
            return new \Plugin\GmoEpsilon\Service\Client\GmoEpsilon_Deferred($app);
        });
        $app['eccube.plugin.epsilon.service.maillink'] = $app->share(function () use ($app) {
            return new \Plugin\GmoEpsilon\Service\Client\GmoEpsilon_Maillink($app);
        });
        $app['eccube.plugin.epsilon.service.regular'] = $app->share(function () use ($app) {
            return new \Plugin\GmoEpsilon\Service\Client\GmoEpsilon_Regular($app);
        });
        $app['eccube.plugin.epsilon.service.mail'] = $app->share(function () use ($app) {
            return new \Plugin\GmoEpsilon\Service\GmoEpsilon_MailService($app);
        });

        // Repository
        $app['eccube.plugin.epsilon.repository.epsilon_plugin'] = $app->share(function () use ($app) {
            return $app['orm.em']->getRepository('Plugin\GmoEpsilon\Entity\GmoEpsilonPlugin');
        });
        $app['eccube.plugin.epsilon.repository.payment_extension'] = $app->share(function () use ($app) {
            return $app['orm.em']->getRepository('\Plugin\GmoEpsilon\Entity\Extension\PaymentExtension');
        });
        $app['eccube.plugin.epsilon.repository.order_extension'] = $app->share(function () use ($app) {
            return $app['orm.em']->getRepository('\Plugin\GmoEpsilon\Entity\Extension\OrderExtension');
        });
        $app['eccube.plugin.epsilon.repository.regular_product'] = $app->share(function () use ($app) {
            return $app['orm.em']->getRepository('\Plugin\GmoEpsilon\Entity\RegularProduct');
        });
        $app['eccube.plugin.epsilon.repository.regular_status'] = $app->share(function () use ($app) {
            return $app['orm.em']->getRepository('\Plugin\GmoEpsilon\Entity\Master\RegularStatus');
        });
        $app['eccube.plugin.epsilon.repository.regular_order'] = $app->share(function () use ($app) {
            $regularOrderRepository = $app['orm.em']->getRepository('Plugin\GmoEpsilon\Entity\RegularOrder');
            $regularOrderRepository->setApp($app);
            $regularOrderRepository->setConfig($app['config']);

            return $regularOrderRepository;
        });
        $app['eccube.plugin.epsilon.repository.credit_access_block'] = $app->share(function () use ($app) {
            return $app['orm.em']->getRepository('Plugin\GmoEpsilon\Entity\CreditAccessBlock');
        });
        $app['eccube.plugin.epsilon.repository.credit_access_logs'] = $app->share(function () use ($app) {
            return $app['orm.em']->getRepository('Plugin\GmoEpsilon\Entity\CreditAccessLogs');
        });

        // form
        $app['form.types'] = $app->share($app->extend('form.types', function ($types) use ($app) {
            $types[] = new \Plugin\GmoEpsilon\Form\Type\ConvenienceType($app);
            $types[] = new \Plugin\GmoEpsilon\Form\Type\Admin\RegularOrderType($app);
            $types[] = new \Plugin\GmoEpsilon\Form\Type\Admin\RegularShippingType($app);
            $types[] = new \Plugin\GmoEpsilon\Form\Type\Admin\RegularShipmentItemType($app);
            $types[] = new \Plugin\GmoEpsilon\Form\Type\Admin\RegularSearchOrderType($app['config']);
            $types[] = new \Plugin\GmoEpsilon\Form\Type\Admin\SearchRegularProductType($app['config']);
            $types[] = new \Plugin\GmoEpsilon\Form\Type\Master\RegularStatusType($app);
            return $types;
        }));

        // em
        if (isset($app['orm.em'])) {
            $app['orm.em'] = $app->share($app->extend('orm.em', function (\Doctrine\ORM\EntityManager $em, \Silex\Application $app) {
                // tax_rule
                $taxRuleRepository = $em->getRepository('Eccube\Entity\TaxRule');
                $low_versions = array('3.0.3', '3.0.4', '3.0.5', '3.0.6');
                if (in_array(Constant::VERSION, $low_versions)) {
                    $taxRuleRepository->setApp($app);
                } else {
                    $taxRuleRepository->setApplication($app);
                }
                $taxRuleService = new \Eccube\Service\TaxRuleService($taxRuleRepository);
                $em->getEventManager()->addEventSubscriber(new \Plugin\GmoEpsilon\Doctrine\EventSubscriber\TaxRuleEventSubscriber($taxRuleService));

                return $em;
            }));
        }

        // sub navi
        if ($app['eccube.plugin.epsilon.repository.regular_product']->getRegularFlg() == 1) {
            $app['config'] = $app->share($app->extend('config', function ($config) {
                foreach ($config['nav'] as $key => $nav) {
                    if ($nav['id'] == 'order') {
                        $orderNav = $nav;
                        $orderNavKey = $key;
                        break;
                    }
                }

                $orderNav['child'][] = array(
                    'id' => 'epsilon_regular_order_master',
                    'name' => '定期受注マスター',
                    'url' => 'epsilon_regular_order',
                );

                $config['nav'][$orderNavKey] = $orderNav;

                return $config;
            }));
        }

        // log file
        $app['monolog.gmoepsilon'] = $app->share(function ($app) {

            $logger = new $app['monolog.logger.class']('gmoepsilon');

            $file = $app['config']['root_dir'] . '/app/log/gmoepsilon.log';
            $RotateHandler = new RotatingFileHandler($file, $app['config']['log']['max_files'], Logger::INFO);
            $RotateHandler->setFilenameFormat(
                'GmoEpsilon_{date}',
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

 ?>
