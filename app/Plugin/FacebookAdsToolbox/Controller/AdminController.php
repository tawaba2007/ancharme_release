<?php
/**
 * Copyright (c) 2016-present, Facebook, Inc.
 * All rights reserved.
 *
 * This source code is licensed under the BSD-style license found in the
 * LICENSE file in the root directory of this source tree. An additional grant
 * of patent rights can be found in the PATENTS file in the code directory.
 */

namespace Plugin\FacebookAdsToolbox\Controller;


use Eccube\Application;
use Eccube\Common\Constant;
use Eccube\Controller\AbstractController;
use Eccube\Event\EventArgs;
use Eccube\Event\EccubeEvents;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use Plugin\FacebookAdsToolbox\Entity\FacebookAdsToolbox;
use Plugin\FacebookAdsToolbox\PluginManager;

class AdminController extends AbstractController {

  public function setting(Application $app, Request $request) {
    $fb_ads = $this->loadFacebookAdsToolbox($app);

    $form = $this->initilizeForm(
      $app,
      $fb_ads->getFbPixel(),
      $fb_ads->getMerchantSettings());

    $form->handleRequest($request);
    if ('POST' === $request->getMethod() && $form->isValid()) {
        $data = $request->get('form');

        $fb_ads->setFbPixel($data['pixel_id']);
        $fb_ads->setMerchantSettings($data['merchant_settings_id']);
        $app['orm.em']->persist($fb_ads);
        $app['orm.em']->flush($fb_ads);
        return $app->redirect($app->url('plugin_FacebookAdsToolbox_config'));
    }

    return $app->render(
      'FacebookAdsToolbox/Resource/template/setting.twig',
      array(
        'form' => $form->createView(),
        'fb_pixel' => $fb_ads,
        'totalItemCount' => $this->getTotalItemCount($app, $request),
        'eccubeVersion' => Constant::VERSION,
        'phpVersion' => PHP_VERSION,
        'pluginVersion' => PluginManager::VERSION,
      ));
  }

  private function initilizeForm(Application $app, $pixel_id = null, $merchant_settings_id = null) {
    $builder = $app['form.factory']->createBuilder();

    $builder->add(
      'pixel_id',
      'text',
      array(
        'required' => true,
        'mapped' => false,
        'constraints' => array(
          new Assert\Regex("/^[0-9]*$/")
        ),
        'data' => $pixel_id
      ));
    $builder->add(
      'merchant_settings_id',
      'text',
      array(
        'required' => true,
        'mapped' => false,
        'constraints' => array(
          new Assert\Regex("/^[0-9]*$/")
        ),
        'data' => $merchant_settings_id
      ));

    return $builder->getForm();
  }

  public function updateAjax(Application $app, Request $request) {
    $fb_ads = $this->loadFacebookAdsToolbox($app);

    $id = $request->get('id');
    $type = $request->get('type');

    switch ($type) {
      case 'pixel':
      $fb_ads->setFbPixel($id);
      $app['orm.em']->persist($fb_ads);
      $app['orm.em']->flush($fb_ads);
      break;
    }

    return '{status:"OK"}';
  }

  private function loadFacebookAdsToolbox(Application $app) {
    $fb_ads =
      $app['facebook_ads_toolbox.repository.facebook_ads_toolbox']->find(1);
    if (is_null($fb_ads)) {
      $fb_ads = new FacebookAdsToolbox();
      $fb_ads->setId(1);
    }
    return $fb_ads;
  }

  private function getTotalItemCount(Application $app, Request $request) {
    // paginator
    $qb = $app['eccube.repository.product']->getQueryBuilderBySearchDataForAdmin(array());
    $qb->andWhere('p.Status = 1');
    $event = new EventArgs(
        array(
            'qb' => $qb,
            'searchData' => array(),
        ),
        $request
    );
    $app['eccube.event.dispatcher']->dispatch(EccubeEvents::ADMIN_PRODUCT_INDEX_SEARCH, $event);
    $searchData = $event->getArgument('searchData');
    $pagination = $app['paginator']()->paginate(
        $qb,
        1,
        1,
        array('wrap-queries' => true));
    return $pagination->getTotalItemCount();
  }
}
