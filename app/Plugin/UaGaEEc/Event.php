<?php
/*
 * UaGaEEc: Google Analytics eコマース/拡張eコマース対応プラグイン
 * Copyright (C) 2016-2017 Freischtide Inc. All Rights Reserved.
 * http://freischtide.tumblr.com/
 *
 * License: see LICENSE.txt
 */

namespace Plugin\UaGaEEc;

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
    private $uagaeec;
    private $uagaeec_tag_rendered = false;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function initUaGaEEc(GetResponseEvent $event)
    {
        $this->repo = $this->app['eccube.plugin.uagaeec.repository.uagaeec'];
        $this->config = Yaml::parse(__DIR__ . '/config.yml');
        $this->uagaeec = $this->repo->findByCode($this->config['code']);
    }

    private function setVars()
    {
        if ($this->uagaeec->getTrackUserId() == $this->config['const']['UAGAEEC_OP_INCLUDE_USER_ID']) {
            if ($this->app['user'] != 'anon.' && method_exists($this->app['user'], 'getId')) {
                $customer_id = $this->app['user']->getId();
                $this->uagaeec->setUID($this->getUuid5($this->config['const']['UAGAEEC_UUID'], $this->uagaeec->getTid(), $customer_id));
            }
        }

        if ($crossdomain_linker = $this->uagaeec->getCrossdomainLinker()) {
            $autoLinks = explode(',', $crossdomain_linker);
            foreach ($autoLinks as $key => $value) {
                //$autoLinks[$key] = '"' . (trim(str_replace('"','',$value))) . '"'; // Escape javascript and add '"' to each domain
                $autoLinks[$key] = "'" . (trim(str_replace("'","",$value))) . "'"; // Escape javascript and add '"' to each domain
            }
            $this->uagaeec->setCrossdomainLinker(implode(',', $autoLinks));
        }

        if ($promo_id = $this->app['request']->get('ugep_id') && $promo_name = $this->app['request']->get('ugep_name')) {
            $promo_id = addslashes($this->app['request']->get('ugep_id'));
            $promo_name = addslashes($this->app['request']->get('ugep_name'));
            $promo_creative = addslashes($this->app['request']->get('ugep_creative'));
            $promo_position = addslashes($this->app['request']->get('ugep_position'));
            $this->uagaeec->setPromo($promo_id, $promo_name, $promo_creative, $promo_position);
        }
    }

    public function setTwigParameters(TemplateEvent $event)
    {
        $this->app['twig_parameters'] = $event->getParameters();
    }

    public function uaGaEEcResponse(FilterResponseEvent $event)
    {
        if ($this->uagaeec_tag_rendered) {
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

        $twig = $this->app->renderView('UaGaEEc/Resource/template/default/uagaeec.twig',
                                       array('uagaeec' => $this->uagaeec,
                                             'config'  => $this->config));

        $this->setResponse($event, $twig);
    }

    public function productList(FilterResponseEvent $event)
    {
        $tid = $this->uagaeec->getTid();
        if (empty($this->app['twig_parameters']) || empty($tid)) {
            return;
        }

        $this->setVars();
        if ($this->uagaeec->getEec() == $this->config['const']['UAGAEEC_USE_EC']) {
            return;
        }

        if ($this->app['request']->getMethod() == 'GET') {
            $name = $this->app['request']->get('name');
            if (!empty($name)) {
                $list = 'Search Results';
            } else {
                $list = 'Category List';
            }
            if ($this->uagaeec->getCategory() == $this->config['const']['UAGAEEC_OP_CATEGORY_ON'] &&
                is_object($this->app['twig_parameters']['Category'])) {
                $category = $this->app['twig_parameters']['Category']->getName();
            } else {
                $category = '';
            }

            $items = $this->app['twig_parameters']['pagination']->getItems();
            $impressions = array();
            if ($this->uagaeec->getImpTrack() == $this->config['const']['UAGAEEC_OP_WITH_IMP_TRACK']) {
                foreach ($items as $item) {
                    $impressions[] = $this->buildEcImpression($item, $list, $category);
                }
            }

            $twig = $this->app->renderView('UaGaEEc/Resource/template/default/uagaeec.twig',
                                           array('uagaeec'     => $this->uagaeec,
                                                 'config'      => $this->config,
                                                 'impressions' => $impressions));

            $this->setResponse($event, $twig);
        }
    }

    public function mypageFavorite(FilterResponseEvent $event)
    {
        $tid = $this->uagaeec->getTid();
        if (empty($this->app['twig_parameters']) || empty($tid)) {
            return;
        }

        $this->setVars();
        if ($this->uagaeec->getEec() == $this->config['const']['UAGAEEC_USE_EC']) {
            return;
        }

        if ($this->app['request']->getMethod() == 'GET') {
            $list = 'Favorite List';

            $items = $this->app['twig_parameters']['pagination']->getItems();
            $impressions = array();

            // Generate impression data when user wants track it
            if ($this->uagaeec->getImpTrack() == $this->config['const']['UAGAEEC_OP_WITH_IMP_TRACK']) {
                foreach ($items as $item) {
                    // Less than v3.0.10 doesn't support getProduct here.
                    if(!method_exists($item, 'getProduct')) {
                        break;
                    } 

                    // CustomerFavoriteProduct => Product
                    $product = $item->getProduct($item->getId());

                    $category = '';
                    if ($this->uagaeec->getCategory() == $this->config['const']['UAGAEEC_OP_CATEGORY_ON']) {
                        $category = $this->extractCategory($product);
                    }

                    $impressions[] = $this->buildEcImpression($product, $list, $category);
                }
            }

            $twig = $this->app->renderView('UaGaEEc/Resource/template/default/uagaeec.twig',
                                           array('uagaeec'     => $this->uagaeec,
                                                 'config'      => $this->config,
                                                 'impressions' => $impressions));

            $this->setResponse($event, $twig);
        }
    }

    public function productDetail(FilterResponseEvent $event)
    {
        $tid = $this->uagaeec->getTid();
        if (empty($this->app['twig_parameters']) || empty($tid)) {
            return;
        }

        $this->setVars();
        if ($this->uagaeec->getEec() == $this->config['const']['UAGAEEC_USE_EC']) {
            return;
        }

        if ($this->app['request']->getMethod() == 'GET') {
            $list = 'Item Detail';

            $product = $this->app['twig_parameters']['Product'];

            $category = '';
            if ($this->uagaeec->getCategory() == $this->config['const']['UAGAEEC_OP_CATEGORY_ON']) {
                $category = $this->extractCategory($product);
            }

            $products = array($this->buildEcProduct($product, $category));
 
            $action  = array('action' => 'detail', 'option' => '');

            $clickFrom = $this->decideList($_SERVER);
            if ($clickFrom != 'Direct Access') {
                $this->uagaeec->setClick($this->getOptionsStr(array('list' => json_encode($clickFrom))));
            }

            $impressions = array();
            if ($this->uagaeec->getImpTrack() == $this->config['const']['UAGAEEC_OP_WITH_IMP_TRACK']) {
                // related product from RelatedProduct plugin by EC-CUBE
                // https://github.com/EC-CUBE/related-product-plugin 
                if (class_exists('Plugin\RelatedProduct\Event') && isset($this->app['eccube.plugin.repository.related_product'])) {

                    $RelatedProducts = [];
                    $id = $product->getId();
                    if ($id) {
                        $Disp = $this->app['eccube.repository.master.disp']->find(Disp::DISPLAY_SHOW);
                        $RelatedProducts = $this->app['eccube.plugin.repository.related_product']->showRelatedProduct($product, $Disp);

                        $loop = count($RelatedProducts);
                        for ($i = 0; $i < $loop; ++$i) {
                            $RelatedProduct = $RelatedProducts[$i];
                            $related_product = $RelatedProduct->getChildProduct();

                            $impressions[] = $this->buildEcImpression($related_product, $list, $category);
                        }
                    }
                }
            }

            $twig = $this->app->renderView('UaGaEEc/Resource/template/default/uagaeec.twig',
                                           array('uagaeec'     => $this->uagaeec,
                                                 'config'      => $this->config,
                                                 'products'    => $products,
                                                 'impressions' => $impressions,
                                                 'action'      => $action));

            $this->setResponse($event, $twig);
        }
    }

    public function cart(FilterResponseEvent $event)
    {
        $tid = $this->uagaeec->getTid();
        if (empty($this->app['twig_parameters']) || empty($tid)) {
            return;
        }

        $this->setVars();
        if ($this->uagaeec->getEec() == $this->config['const']['UAGAEEC_USE_EC']) {
            return;
        }

        if ($this->app['request']->getMethod() == 'GET') {
            $cartItems = $this->app['twig_parameters']['Cart']->getCartItems();

            $products = array();
            foreach ($cartItems as $cartItem) {
                $product = $cartItem->getObject()->getProduct();

                $category = '';
                if ($this->uagaeec->getCategory() == $this->config['const']['UAGAEEC_OP_CATEGORY_ON']) {
                    $category = $this->extractCategory($product);
                }

                $products[] = $this->buildEcProduct($product, $category, $cartItem->getPrice(), $cartItem->getQuantity());
            }

            $action  = array('action' => 'add', 'option' => '');

            $twig = $this->app->renderView('UaGaEEc/Resource/template/default/uagaeec.twig',
                                           array('uagaeec'  => $this->uagaeec,
                                                 'config'   => $this->config,
                                                 'products' => $products,
                                                 'action'   => $action));

            $this->setResponse($event, $twig);
        }
    }

	// step 1: ログイン
    public function shopping_login(FilterResponseEvent $event)
    {
        $tid = $this->uagaeec->getTid();
        if (empty($this->app['twig_parameters']) || empty($tid)) {
            return;
        }

        $this->setVars();
        if ($this->uagaeec->getEec() == $this->config['const']['UAGAEEC_USE_EC']) {
            return;
        }

        if ($this->app['request']->getMethod() == 'GET') {

			$action = array('action' => 'checkout', 'option' => $this->getOptionsStr(array(
				'step' => 1 // ログイン
			)));

            $twig = $this->app->renderView('UaGaEEc/Resource/template/default/uagaeec.twig',
                                           array('uagaeec' => $this->uagaeec,
                                                 'config'  => $this->config,
                                                 'action'  => $action));

            $this->setResponse($event, $twig);
        }
    }

	// step 2: お客様情報
    public function shopping_nonmember(FilterResponseEvent $event)
    {
        $tid = $this->uagaeec->getTid();
        if (empty($this->app['twig_parameters']) || empty($tid)) {
            return;
        }

        $this->setVars();
        if ($this->uagaeec->getEec() == $this->config['const']['UAGAEEC_USE_EC']) {
            return;
        }

        if ($this->app['request']->getMethod() == 'GET') {

			$action = array('action' => 'checkout', 'option' => $this->getOptionsStr(array(
				'step' => 2 // お客様情報
			)));

            $twig = $this->app->renderView('UaGaEEc/Resource/template/default/uagaeec.twig',
                                           array('uagaeec' => $this->uagaeec,
                                                 'config'  => $this->config,
                                                 'action'  => $action));

            $this->setResponse($event, $twig);
        }
    }

	// step 3: ご注文内容確認
    public function shopping(FilterResponseEvent $event)
    {
        $tid = $this->uagaeec->getTid();
        if (empty($this->app['twig_parameters']) || empty($tid)) {
            return;
        }

        $this->setVars();
        if ($this->uagaeec->getEec() == $this->config['const']['UAGAEEC_USE_EC']) {
            return;
        }

        if ($this->app['request']->getMethod() == 'GET') {
            // order id を一時的に保持（ペイジェント等の外部決済システムが order id を返さないため）
            if (isset($this->app['twig_parameters']['Order']['id'])) {
                $cookie = isset($_COOKIE['eccube_uagaeec']) ? json_decode($_COOKIE['eccube_uagaeec'],true) : array();

                $cookie['orderId'] = $this->app['twig_parameters']['Order']['id'];
                setcookie('eccube_uagaeec', json_encode($cookie), time()+60*60, '/');
            }

            $order = $this->app['twig_parameters']['Order'];
            $orderDetails = $order->getOrderDetails();

            $products = array();
            foreach ($orderDetails as $orderDetail) {
                $product = $orderDetail['Product'];

                $category = '';
                if ($this->uagaeec->getCategory() == $this->config['const']['UAGAEEC_OP_CATEGORY_ON']) {
                    $category = $this->extractCategory($product);
                }

                $products[] = $this->buildEcProduct($product, $category, $orderDetail['price_inc_tax'], $orderDetail['quantity']);
            }

			$action = array('action' => 'checkout', 'option' => $this->getOptionsStr(array(
				'step' => 3, // 注文内容確認
				//'option' => '"' . $orderDetail['Order']['payment_method'] . '"'
			)));

            $twig = $this->app->renderView('UaGaEEc/Resource/template/default/uagaeec.twig',
                                           array('uagaeec'  => $this->uagaeec,
                                                 'config'   => $this->config,
                                                 'products' => $products,
                                                 'action'   => $action));

            $this->setResponse($event, $twig);
        }
    }

    public function shoppingComplete(FilterResponseEvent $event)
    {
        $tid = $this->uagaeec->getTid();
        if (empty($this->app['twig_parameters']) || empty($tid)) {
            return;
        }

        $this->setVars();

        if ($this->app['request']->getMethod() == 'GET') {
            // 必要に応じて cookie より order id を復元
            if (isset($this->app['twig_parameters']['orderId'])) {
                $orderId = $this->app['twig_parameters']['orderId'];
            } else {
                $cookie = isset($_COOKIE['eccube_uagaeec']) ? json_decode($_COOKIE['eccube_uagaeec'],true) : array();
                if (isset($cookie['orderId'])) {
                    $orderId = $cookie['orderId'];

                    unset($cookie['orderId']);
                    setcookie('eccube_uagaeec', json_encode($cookie), time()+60*60, '/');
                } else {
                    return;
                }
            }

            $order = $this->app['eccube.repository.order']->find($orderId);
            $orderDetails = $order->getOrderDetails();

            $products = array();
            foreach ($orderDetails as $orderDetail) {
                $product = $orderDetail['Product'];

                $category = '';
                if ($this->uagaeec->getCategory() == $this->config['const']['UAGAEEC_OP_CATEGORY_ON']) {
                    $category = $this->extractCategory($product);
                }

                $products[] = $this->buildEcProduct($product, $category, $orderDetail['price_inc_tax'], $orderDetail['quantity']);
            }

            $transaction = array('id'       => "'" . $order['id'] . "'",
                                 'revenue'  => "'" . $order['total'] . "'",
                                 'tax'      => "'" . $order['tax'] . "'",
                                 'shipping' => "'" . $order['delivery_fee_total'] . "'");

            $action = array('action' => 'purchase', 'option' => $this->getOptionsStr($transaction));

            $twig = $this->app->renderView('UaGaEEc/Resource/template/default/uagaeec.twig',
                                           array('uagaeec'     => $this->uagaeec,
                                                 'config'      => $this->config,
                                                 'products'    => $products,
                                                 'action'      => $action,
                                                 'transaction' => $transaction));

            $this->setResponse($event, $twig);
        }
    }

    private function setResponse($event, $twig)
    {
        $response = $event->getResponse();
        $html = $response->getContent();

        $html = str_replace('</head>', $twig.'</head>', $html);

        $response->setContent($html);
        $event->setResponse($response);

        $this->uagaeec_tag_rendered = true;
    }

    private function extractCategory($product)
    {
        $productCategories = $product->getProductCategories();
        $categories = array();
        foreach ($productCategories as $productCategory) {
            $categories[] = $productCategory['Category']->getName();
        }
        $category = implode('/', $categories);

        return $category;
    }

    private function getOptionsStr($options)
    {
        $results = array();
        foreach ($options as $k => $v) {
            $results[] = "'" . $k . "': " . $v;
        }

        return implode(', ', $results);
    }

    private function decideList($serverEnv)
    {
        if(!empty($serverEnv['HTTP_REFERER'])) {
            $referrer = $serverEnv['HTTP_REFERER'];
        } else {
            return 'Direct Access';
        }

        $url = parse_url($referrer);
        if ($url['host'] == $serverEnv['SERVER_NAME']) {
            switch (true) {
            case $url['path'] == '/':
                return 'TOP';

            case stristr($url['path'], '/mypage/favorite'):
                return 'Favorite List';

            case stristr($url['path'], '/products/list'):
                $name = $this->app['request']->get('name');
                if (!empty($name)) {
                    return 'Search Results';
                } else {
                    return 'Category List';
                }

            case stristr($url['path'], '/products/detail'):
                return 'Item Detail';

            default:
                return 'Internal Site';
            }

        } else {
            if ($this->uagaeec->getUseCustomReferrer() == $this->config['const']['UAGAEEC_OP_USE_CUSTOM_REFERRER']) {
                foreach ($this->uagaeec->getCustomReferrers() as $customer_referrer) {
                    if (stristr($referrer, $customer_referrer[0])) {
                        return addslashes($customer_referrer[1]);
                    }
                }
            }

            return 'External Site';
        }
    }

    private function getUuid5($namespace_id, $ga_tid, $customer_id)
    {
        $customer_hash = sha1($namespace_id . $ga_tid . $customer_id);

        $time_low            = substr($customer_hash,  0,  8);
        $time_mid            = substr($customer_hash,  8,  4);
        $time_hi_and_version = substr($customer_hash, 12,  4);
        $time_hi_and_version = sprintf('%04x', (intval('0x' . $time_hi_and_version, 16) & 0x0fff) | 0x3000);
        $clk_seq_hi_res      = substr($customer_hash, 16,  2);
        $clk_seq_hi_res      = sprintf('%02x', (intval('0x' . $clk_seq_hi_res, 16) & 0x3f) | 0x80);
        $clk_seq_low         = substr($customer_hash, 18,  2);
        $node                = substr($customer_hash, 20, 12);

        return sprintf('%8s-%4s-%4s-%2s%2s-%12s', $time_low, $time_mid, $time_hi_and_version, $clk_seq_hi_res, $clk_seq_low, $node);
    }

    private function buildEcImpression($item, $list, $category)
    {
        return array('id'       => $item->getId(),
                     'name'     => addslashes($item->getName()),
                     'list'     => $list,
                     'category' => addslashes($category),
                     'price'    => $item->getPrice02IncTaxMax());
    }

    private function buildEcProduct($product, $category, $price = null, $quantity = 0)
    {
        return array('id'       => $product->getId(),
                     'name'     => addslashes($product->getName()),
                     'price'    => $price == null ? $product->getPrice02IncTaxMax() : $price,
                     'quantity' => $quantity,
                     'category' => addslashes($category));
    }
}
