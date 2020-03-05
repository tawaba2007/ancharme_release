<?php
/**
 * Copyright (c) 2016-present, Facebook, Inc.
 * All rights reserved.
 *
 * This source code is licensed under the BSD-style license found in the
 * LICENSE file in the root directory of this source tree. An additional grant
 * of patent rights can be found in the PATENTS file in the code directory.
 */

namespace Plugin\FacebookAdsToolbox;

use Eccube\Application;
use Eccube\Common\Constant;
use Eccube\Event\TemplateEvent;
use Eccube\Event\EventArgs;
use Eccube\Entity\Product;
use Eccube\Repository\Order;
use Plugin\FacebookAdsToolbox\Entity\FacebookAdsToolbox;
use Plugin\FacebookAdsToolbox\PluginManager;

class PixelEvent {

  /**
   * var Application
   */
  private $app;

  private $fbPixel = null;

  /**
   * initilize object
   */
  public function __construct (Application $app) {
    $this->app = $app;
  }

  /**
   * get pixel id from database.
   *
   */
  private function getFbPixel() {
    if (is_null($this->fbPixel)) {
      $fb_pixel =
        $this->app['facebook_ads_toolbox.repository.facebook_ads_toolbox']
        ->find(1);
      if (!is_null($fb_pixel)) {
        $this->fbPixel = $fb_pixel->getFbPixel();
      }
    }
    return $this->fbPixel;
  }

  /**
   * inject facebook pixel to index page.
   *
   */
  public function onIndexInitialize (TemplateEvent $event) {
    $needle = '{% block javascript %}';
    $tag = <<<"EOT"
{% block javascript %}
{$this->generateFacebookPixelTag(
  $this->getFbPixel(),
  'PageView',
  array(),
  null
  )}
EOT;
    $tag_end_block = '{% endblock %}';
    $this->setSource($event, $needle, $tag, $tag_end_block);
  }

  /**
   * inject facebook pixel to product detail page.
   *
   */
  public function onProductDetailInitialize (TemplateEvent $event) {
    $params = $event->getParameters();
    $product = $params['Product'];
    $product->getProductClasses();

    $needle = '{% block javascript %}';
    $tag = <<<"EOT"
{% block javascript %}
{{ parent() }}
{$this->generateFacebookPixelTag(
  $this->getFbPixel(),
  'ViewContent',
  $product->getId(),
  $product->getPrice02IncTaxMin()
  )}
EOT;
    $tag_end_block = '{% endblock %}';
    $this->setSource($event, $needle, $tag, $tag_end_block);
  }

  /**
   * inject facebook pixel to cart index page.
   *
   */
  public function onCartIndexInitialize (TemplateEvent $event) {
    $params = $event->getParameters();
    $cart = $params['Cart'];

    $product_ids = array();
    $last_product_id = '';
    $last_product_price = 0;

    foreach ($cart->getCartItems() as $item) {
        $last_product_id = $item->getObject()->getProduct()->getId();
        $last_product_price = $item->getPrice();
    }

    $needle = '{% block javascript %}';
    $tag = <<<"EOT"
{% block javascript %}
{{ parent() }}
{$this->generateFacebookPixelTag(
  $this->getFbPixel(),
  'AddToCart',
  $last_product_id,
  $last_product_price
  )}
EOT;
    $tag_end_block = '{% endblock %}';
    $this->setSource($event, $needle, $tag, $tag_end_block);
  }

  /**
   * @param EventArgs $event
   */
  public function onShoppingIndexInitialize(EventArgs $event) {
      $Order = $event->getArgument('Order');

      $this->app['session']->set('eccube.front.shopping.order.id', $Order->getId());
  }

  /**
   * inject facebook pixel to shopping complete page.
   *
   */
  public function onShoppingCompleteInitialize (TemplateEvent $event) {
    $params = $event->getParameters();
    $order_id = $params['orderId'];
    /** @var $TargetOrder \Eccube\Entity\Order */

    $target_order = $this->app['eccube.repository.order']->find($order_id);
    if (is_null($target_order)) {
        return;
    }

    $product_ids = array();
    foreach ($target_order->getOrderDetails() as $order_detail) {
        $product_ids[] = $order_detail->getProduct()->getId();
    }
    $product_ids_str = json_encode($product_ids);
    $needle = '{% block javascript %}';
    $tag = <<<"EOT"
{% block javascript %}
{{ parent() }}
{$this->generateFacebookPixelTag(
  $this->getFbPixel(),
  'Purchase',
  $product_ids,
  $target_order->getTotalPrice()
  )}
EOT;
    $tag_end_block = '{% endblock %}';
    $this->setSource($event, $needle, $tag, $tag_end_block);
  }

  public function generateFacebookPixelTag(
    $pixel_id,
    $event,
    $product_ids,
    $value) {

    if (is_null($pixel_id)) {
      return;
    }

    $agent = 'execcube-' . Constant::VERSION . '-' . PluginManager::VERSION;
    $params = array(
      'agent' => $agent
    );
    if (!empty($product_ids)) {
      $params['content_ids'] = $product_ids;
      $params['content_type'] = 'product';
      $params['value'] = $value;
      $params['currency'] = 'JPY';
    }
    $params_str = json_encode($params);
    $pageview = '';
    if ($event !== 'PageView' ) {
      $pageview = "fbq('track', 'PageView', {$params_str});";
    }
    $tag = <<<"EOT"
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '{$pixel_id}', {}, {agent:'{$agent}'});
{$pageview}
fbq('track', '{$event}', {$params_str});
</script>
<!-- End Facebook Pixel Code -->
EOT;

    return $tag;
  }

  /**
   * check needle and set source.
   *
   */
  private static function setSource(TemplateEvent $event, $needle, $tag, $tag_end_block) {
    $source = $event->getSource();
    if (strpos($source, $needle)) {
      $source = str_replace($needle, $tag, $source);
      $event->setSource($source);
    }else {
      $event->setSource($source . $tag . $tag_end_block);
    }
  }
}
