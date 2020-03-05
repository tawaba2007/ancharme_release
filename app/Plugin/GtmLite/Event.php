<?php
/*
 * GtmLite: Google Tag Manager コンテナタグ設置プラグイン
 * Copyright (C) 2017 Freischtide Inc. All Rights Reserved.
 * http://freischtide.tumblr.com/
 *
 * License: see LICENSE.txt
 */

namespace Plugin\GtmLite;

use Eccube\Application;
use Eccube\Event\TemplateEvent;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\Yaml\Yaml;

use Eccube\Common\Constant;
use Eccube\Entity\Master\Disp;
use Plugin\RelatedProduct\Entity as RelatedProductEntity;
use Plugin\RelatedProduct\Repository as RelatedProductRepository;

class Event
{
    private $app;
    private $repo;
    private $config;
    private $gtmlite;
    private $gtmlite_tag_rendered = false;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function initGtmLite(GetResponseEvent $event)
    {
        $this->repo = $this->app['eccube.plugin.gtmlite.repository.gtmlite'];
        $this->config = Yaml::parse(__DIR__ . '/config.yml');
        $this->gtmlite = $this->repo->findByCode($this->config['code']);
    }

    private function setVars()
    {
    }

    public function setTwigParametersGtmLite(TemplateEvent $event)
    {
        $this->app['twig_parameters'] = $event->getParameters();
    }

    public function responseGtmLite(FilterResponseEvent $event)
    {
        if ($this->gtmlite_tag_rendered) {
            return;
        }

        $route = $event->getRequest()->attributes->get('_route');
        if (is_null($route)) {
            return;
        }
        if (strpos($route, 'admin') === 0) {
            return;
        }
        if (strpos($route, 'plugin') === 0) {
            return;
        }
        /*
         * https://www.ec-cube.net/products/detail.php?product_id=1008
         * 「商品編集用CSVダウンロード」プラグインとの競合回避
         */
        if ($route == 'editcsv_export') {
            return;
        }

        $this->setVars();

        $twig = $this->app->renderView('GtmLite/Resource/template/default/gtmlite.twig',
                                       array('gtmlite' => $this->gtmlite,
                                             'config'  => $this->config));

        $this->setResponse($event, $twig);
    }

    public function productListGtmLite(FilterResponseEvent $event)
    {
        $tid = $this->gtmlite->getTid();
        if (empty($this->app['twig_parameters']) || empty($tid)) {
            return;
        }

        if ($this->gtmlite->getOptionalEvents() == $this->config['const']['GTMLITE_OP_OPTIONAL_EVENTS_OFF']) {
            return;
        }

        $this->setVars();

        if ($this->app['request']->getMethod() == 'GET') {
            $name = $this->app['request']->get('name');
            if (!empty($name)) {
                $gtm_event = 'product_search';
            } else {
                $gtm_event = 'product_list';
            }

            $twig = $this->app->renderView('GtmLite/Resource/template/default/gtmlite.twig',
                                           array('gtmlite'    => $this->gtmlite,
                                                 'config'     => $this->config,
                                                 'event'      => $gtm_event));

            $this->setResponse($event, $twig);
        }
    }

    public function mypageFavoriteGtmLite(FilterResponseEvent $event)
    {
        $tid = $this->gtmlite->getTid();
        if (empty($this->app['twig_parameters']) || empty($tid)) {
            return;
        }

        if ($this->gtmlite->getOptionalEvents() == $this->config['const']['GTMLITE_OP_OPTIONAL_EVENTS_OFF']) {
            return;
        }

        $this->setVars();

        if ($this->app['request']->getMethod() == 'GET') {
            $gtm_event = 'mypage_favorite';

            $twig = $this->app->renderView('GtmLite/Resource/template/default/gtmlite.twig',
                                           array('gtmlite'    => $this->gtmlite,
                                                 'config'     => $this->config,
                                                 'event'      => $gtm_event));

            $this->setResponse($event, $twig);
        }
    }

    public function productDetailGtmLite(FilterResponseEvent $event)
    {
        $tid = $this->gtmlite->getTid();
        if (empty($this->app['twig_parameters']) || empty($tid)) {
            return;
        }

        if ($this->gtmlite->getOptionalEvents() == $this->config['const']['GTMLITE_OP_OPTIONAL_EVENTS_OFF']) {
            return;
        }

        $this->setVars();

        if ($this->app['request']->getMethod() == 'GET') {
            $gtm_event = 'product_detail';

            $twig = $this->app->renderView('GtmLite/Resource/template/default/gtmlite.twig',
                                           array('gtmlite'    => $this->gtmlite,
                                                 'config'     => $this->config,
                                                 'event'      => $gtm_event));

            $this->setResponse($event, $twig);
        }
    }

    public function cartGtmLite(FilterResponseEvent $event)
    {
        $tid = $this->gtmlite->getTid();
        if (empty($this->app['twig_parameters']) || empty($tid)) {
            return;
        }

        if ($this->gtmlite->getOptionalEvents() == $this->config['const']['GTMLITE_OP_OPTIONAL_EVENTS_OFF']) {
            return;
        }

        $this->setVars();

        if ($this->app['request']->getMethod() == 'GET') {
            $gtm_event = 'cart';

            $twig = $this->app->renderView('GtmLite/Resource/template/default/gtmlite.twig',
                                           array('gtmlite' => $this->gtmlite,
                                                 'config'  => $this->config,
                                                 'event'   => $gtm_event));

            $this->setResponse($event, $twig);
        }
    }

	// step 1: ログイン
    public function shoppingLoginGtmLite(FilterResponseEvent $event)
    {
        $tid = $this->gtmlite->getTid();
        if (empty($this->app['twig_parameters']) || empty($tid)) {
            return;
        }

        if ($this->gtmlite->getOptionalEvents() == $this->config['const']['GTMLITE_OP_OPTIONAL_EVENTS_OFF']) {
            return;
        }

        $this->setVars();

        if ($this->app['request']->getMethod() == 'GET') {
            $gtm_event = 'checkout_login';

            $twig = $this->app->renderView('GtmLite/Resource/template/default/gtmlite.twig',
                                           array('gtmlite' => $this->gtmlite,
                                                 'config'  => $this->config,
                                                 'event'   => $gtm_event));

            $this->setResponse($event, $twig);
        }
    }

	// step 2: お客様情報
    public function shoppingNonmemberGtmLite(FilterResponseEvent $event)
    {
        $tid = $this->gtmlite->getTid();
        if (empty($this->app['twig_parameters']) || empty($tid)) {
            return;
        }

        if ($this->gtmlite->getOptionalEvents() == $this->config['const']['GTMLITE_OP_OPTIONAL_EVENTS_OFF']) {
            return;
        }

        $this->setVars();

        if ($this->app['request']->getMethod() == 'GET') {
            $gtm_event = 'checkout_nonmember';

            $twig = $this->app->renderView('GtmLite/Resource/template/default/gtmlite.twig',
                                           array('gtmlite' => $this->gtmlite,
                                                 'config'  => $this->config,
                                                 'event'   => $gtm_event));

            $this->setResponse($event, $twig);
        }
    }

	// step 3: ご注文内容確認
    public function shoppingGtmLite(FilterResponseEvent $event)
    {
        $tid = $this->gtmlite->getTid();
        if (empty($this->app['twig_parameters']) || empty($tid)) {
            return;
        }

        if ($this->gtmlite->getOptionalEvents() == $this->config['const']['GTMLITE_OP_OPTIONAL_EVENTS_OFF']) {
            return;
        }

        $this->setVars();

        if ($this->app['request']->getMethod() == 'GET') {
            $gtm_event = 'checkout_shopping';

            $twig = $this->app->renderView('GtmLite/Resource/template/default/gtmlite.twig',
                                           array('gtmlite' => $this->gtmlite,
                                                 'config'  => $this->config,
                                                 'event'   => $gtm_event));

            $this->setResponse($event, $twig);
        }
    }

    public function shoppingCompleteGtmLite(FilterResponseEvent $event)
    {
        $tid = $this->gtmlite->getTid();
        if (empty($this->app['twig_parameters']) || empty($tid)) {
            return;
        }

        if ($this->gtmlite->getOptionalEvents() == $this->config['const']['GTMLITE_OP_OPTIONAL_EVENTS_OFF']) {
            return;
        }

        $this->setVars();

        if ($this->app['request']->getMethod() == 'GET') {
            $gtm_event = 'checkout_shopping_complete';

            $twig = $this->app->renderView('GtmLite/Resource/template/default/gtmlite.twig',
                                           array('gtmlite'    => $this->gtmlite,
                                                 'config'     => $this->config,
                                                 'event'      => $gtm_event));

            $this->setResponse($event, $twig);
        }
    }

    private function setResponse($event, $twig)
    {
        $response = $event->getResponse();
        $html = $response->getContent();

        // body に GTM タグを追加
        $html = preg_replace('/(<body.*?>)/', '${1}'.$twig, $html);

        // head に GTM タグを追加
        $head = $this->app->renderView('GtmLite/Resource/template/default/gtmlite.head.twig',
                                       array('gtmlite' => $this->gtmlite,
                                             'config'  => $this->config));
        $html = str_replace('</head>', $head.'</head>', $html);

        $response->setContent($html);
        $event->setResponse($response);

        $this->gtmlite_tag_rendered = true;
    }
}
