<?php

/*
 * This file is part of the ApgProductClassImage
 *
 * Copyright (C) 2018 ARCHIPELAGO Inc.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\ApgProductClassImage\Controller;

use Eccube\Application;
use Plugin\ApgProductClassImage\Entity\ProductClassImageSetting;
use Plugin\ApgProductClassImage\Repository\ProductClassImageSettingRepository;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

class ConfigController
{

    /**
     * ApgProductClassImage用設定画面
     *
     * @param Application $app
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Application $app, Request $request)
    {

        /** @var ProductClassImageSettingRepository $productClassImageSettingRepository */
        $productClassImageSettingRepository = $app[APGPRODUCTCLASSIMAGE_REPOSITORY_PRODUCT_CLASS_IMAGE_SETTING];
        /** @var ProductClassImageSetting $ProductClassImageSetting */
        $ProductClassImageSetting = $productClassImageSettingRepository->getOrNew();

        /** @var Form $form */
        $form = $app['form.factory']->createBuilder('apgproductclassimage_config', $ProductClassImageSetting)->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $status = $productClassImageSettingRepository->save($data);
            if ($status) {
                $app->addSuccess('更新しました', 'admin');
                return $app->redirect($app->url('plugin_ApgProductClassImage_config'));
            }
            $app->addError('保存できませんでした', 'admin');
        }


        return $app->render('ApgProductClassImage/Resource/template/admin/config.twig', array(
            'form' => $form->createView(),
            'ProductClassImageSetting' => $ProductClassImageSetting,
        ));
    }

}
