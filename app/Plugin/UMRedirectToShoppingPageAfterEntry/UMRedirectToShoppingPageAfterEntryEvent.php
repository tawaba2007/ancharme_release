<?php

/*
 * This file is part of the UMRedirectToShoppingPageAfterEntry
 *
 * Copyright (C) 2018 U-Mebius Inc.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\UMRedirectToShoppingPageAfterEntry;

use Eccube\Application;
use Eccube\Event\EventArgs;
use Eccube\Event\TemplateEvent;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Event\PostResponseEvent;

class UMRedirectToShoppingPageAfterEntryEvent
{

    /** @var  \Eccube\Application $app */
    private $app;

    /**
     * UMRedirectToShoppingPageAfterEntryEvent constructor.
     *
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * @param EventArgs $event
     */
    public function onFrontEntryIndexInitialize(EventArgs $event)
    {
        $app = $this->app;
        $request = $app['request'];
        if ('GET' == $request->getMethod()) {
            if ($request->query->get('shopping') === '1') {
                $app['session']->set('is_entry_shopping', '1');
            } else {
                $app['session']->remove('is_entry_shopping');
            }
        }
    }

    public function onControllerEntryActivateBefore(FilterResponseEvent $event){
        $app = $this->app;
        if ($app['session']->get('is_entry_shopping') === '1'
            && 0 < $app['eccube.service.cart']->getCart()->getTotalQuantity()) {
            $event->setResponse($app->redirect($app->url('cart_buystep')));
        }
    }

    public function onRenderShoppingLogin(TemplateEvent $event){
        $app = $this->app;
        $app['plugin.umebius.service.twig']->initWithTemplateEvent($event);
        $app['plugin.umebius.service.twig']->preg_replace("/\{\{\s*url\('entry'\)\s*\}\}/", "{{ url('entry', {shopping: 1}) }}");
        $event->setSource($app['plugin.umebius.service.twig']->getSource());
    }

    /**
     * 解析用HTMLを取得
     *
     * @param Crawler $crawler
     * @return string
     */
    private function getHtml(Crawler $crawler)
    {
        $html = '';
        /** @var \DOMElement $domElement */
        foreach ($crawler as $domElement) {
            $domElement->ownerDocument->formatOutput = true;
            $html .= $domElement->ownerDocument->saveHTML();
        }

        return html_entity_decode($html, ENT_NOQUOTES, 'UTF-8');
    }
}


if (!function_exists('http_build_url')) {
    define('HTTP_URL_REPLACE', 1);
    define('HTTP_URL_JOIN_PATH', 2);
    define('HTTP_URL_JOIN_QUERY', 4);
    define('HTTP_URL_STRIP_USER', 8);
    define('HTTP_URL_STRIP_PASS', 16);
    define('HTTP_URL_STRIP_AUTH', 32);
    define('HTTP_URL_STRIP_PORT', 64);
    define('HTTP_URL_STRIP_PATH', 128);
    define('HTTP_URL_STRIP_QUERY', 256);
    define('HTTP_URL_STRIP_FRAGMENT', 512);
    define('HTTP_URL_STRIP_ALL', 1024);

    /**
     * @param $url
     * @param array $parts
     * @param int $flags
     * @param bool $new_url
     * @return string
     */
    function http_build_url($url, $parts = array(), $flags = HTTP_URL_REPLACE, &$new_url = false)
    {
        $keys = array('user', 'pass', 'port', 'path', 'query', 'fragment');

        if ($flags & HTTP_URL_STRIP_ALL) {
            $flags |= HTTP_URL_STRIP_USER;
            $flags |= HTTP_URL_STRIP_PASS;
            $flags |= HTTP_URL_STRIP_PORT;
            $flags |= HTTP_URL_STRIP_PATH;
            $flags |= HTTP_URL_STRIP_QUERY;
            $flags |= HTTP_URL_STRIP_FRAGMENT;
        }
        else if ($flags & HTTP_URL_STRIP_AUTH) {
            $flags |= HTTP_URL_STRIP_USER;
            $flags |= HTTP_URL_STRIP_PASS;
        }

        $parse_url = parse_url($url);

        // Scheme and Host are always replaced
        if (isset($parts['scheme']))
            $parse_url['scheme'] = $parts['scheme'];
        if (isset($parts['host']))
            $parse_url['host'] = $parts['host'];

        if ($flags & HTTP_URL_REPLACE) {
            foreach ($keys as $key) {
                if (isset($parts[$key]))
                    $parse_url[$key] = $parts[$key];
            }
        } else {
            if (isset($parts['path']) && ($flags & HTTP_URL_JOIN_PATH)) {
                if (isset($parse_url['path']))
                    $parse_url['path'] = rtrim(str_replace(basename($parse_url['path']), '', $parse_url['path']), '/') . '/' . ltrim($parts['path'], '/');
                else
                    $parse_url['path'] = $parts['path'];
            }

            if (isset($parts['query']) && ($flags & HTTP_URL_JOIN_QUERY)) {
                if (isset($parse_url['query']))
                    $parse_url['query'] .= '&' . $parts['query'];
                else
                    $parse_url['query'] = $parts['query'];
            }
        }

        foreach ($keys as $key) {
            if ($flags & (int)constant('HTTP_URL_STRIP_' . strtoupper($key)))
                unset($parse_url[$key]);
        }


        $new_url = $parse_url;

        return
            ((isset($parse_url['scheme'])) ? $parse_url['scheme'] . '://' : '')
            . ((isset($parse_url['user'])) ? $parse_url['user'] . ((isset($parse_url['pass'])) ? ':' . $parse_url['pass'] : '') . '@' : '')
            . ((isset($parse_url['host'])) ? $parse_url['host'] : '')
            . ((isset($parse_url['port'])) ? ':' . $parse_url['port'] : '')
            . ((isset($parse_url['path'])) ? $parse_url['path'] : '')
            . ((isset($parse_url['query'])) ? '?' . $parse_url['query'] : '')
            . ((isset($parse_url['fragment'])) ? '#' . $parse_url['fragment'] : '');
    }
}

function replaceOrAppendUrlParameters($url, $params) {
    $componens = parse_url($url);
    parse_str(isset($componens['query']) ? $componens['query'] : "", $queries);

    if (is_array($params)) {
        foreach ($params as $key => $value) {
            $queries[$key] = $value;
        }
    }

    $componens['query'] = http_build_query($queries);
    return http_build_url($url, $componens);
}