<?php
/**
 * Copyright (c) 2016-present, Facebook, Inc.
 * All rights reserved.
 *
 * This source code is licensed under the BSD-style license found in the
 * LICENSE file in the root directory of this source tree. An additional grant
 * of patent rights can be found in the PATENTS file in the code directory.
 */

namespace Plugin\FacebookAdsToolbox\ServiceProvider;

use Eccube\Application;
use Silex\Application as BaseApplication;
use Silex\ServiceProviderInterface;
use Plugin\FacebookAdsToolbox\Entity\FacebookAdsToolbox;

class FacebookAdsToolboxServiceProvider implements ServiceProviderInterface {
    public function register(BaseApplication $app) {
      // Repository
      $app['facebook_ads_toolbox.repository.facebook_ads_toolbox'] = $app->share(function () use ($app) {
          return $app['orm.em']->getRepository('Plugin\FacebookAdsToolbox\Entity\FacebookAdsToolbox');
      });

      $app->match(
        $app['config']['admin_route'] .'/facebook_ads_toolbox/setting',
        '\Plugin\FacebookAdsToolbox\Controller\AdminController::setting')->bind('plugin_FacebookAdsToolbox_config');

      $app->match(
        $app['config']['admin_route'] .'/facebook_ads_toolbox/update',
        '\Plugin\FacebookAdsToolbox\Controller\AdminController::updateAjax')->bind('plugin_FacebookAdsToolbox_update');

      $app->match(
        '/product_feed.tsv',
        '\Plugin\FacebookAdsToolbox\Controller\ProductFeedController::export')->bind('plugin_FacebookAdsToolbox_feed');
    }

    public function boot(BaseApplication $app) {
    }
}
