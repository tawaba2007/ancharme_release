<?php

/*
 * This file is part of the ApgProductClassImage
 *
 * Copyright (C) 2018 ARCHIPELAGO Inc.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\ApgProductClassImage\Logic\TemplateEvent\Admin;


use Eccube\Entity\ProductClass;
use Eccube\Event\TemplateEvent;
use Eccube\Repository\ProductClassRepository;
use Plugin\ApgProductClassImage\Entity\ProductClassImage;
use Plugin\ApgProductClassImage\Entity\ProductClassImageSetting;
use Plugin\ApgProductClassImage\Logic\BaseTemplateEventLogic;
use Plugin\ApgProductClassImage\Repository\ProductClassImageSettingRepository;
use Plugin\ApgProductClassImage\Util\ViewHelper;
use Symfony\Component\Form\FormView;

/**
 * Class RenderProductClassLogic
 * @package Plugin\ApgProductClassImage\Logic\TemplateEvent\Admin
 *
 * 商品規格画面が表示されたときのレンダー処理
 */
class RenderProductClassLogic extends BaseTemplateEventLogic
{

    public function execute(TemplateEvent $event)
    {
        $source = $event->getSource();
        $twig = $this->app['twig'];

        // js
        $insertSource = $twig->getLoader()->getSource('ApgProductClassImage/Resource/template/admin/product_class_image_js.twig');
        $source = ViewHelper::insertJs($source, $insertSource);
        // css
        $insertSource = $twig->getLoader()->getSource('ApgProductClassImage/Resource/template/admin/product_class_image_css.twig');
        $source = ViewHelper::insertCss($source, $insertSource);

        // header
        $pattern = '|<tr id="result_box__header">(.*?)<\/tr>|s';
        $addRow = '<th id="result_box__header_file_name">画像</th>';
        if (preg_match($pattern, $source, $matches, PREG_OFFSET_CAPTURE)) {
            $replacement = $matches[1][0] . $addRow;
            $source = preg_replace($pattern, $replacement, $source);
        }

        // data
        $pattern = '|id="result_box__item--(.*?)<\/tr>|s';
        $addRow = $twig->getLoader()->getSource('ApgProductClassImage/Resource/template/admin/product_class_image.twig');
        if (preg_match($pattern, $source, $matches, PREG_OFFSET_CAPTURE)) {
            $replacement = $matches[1][0] . $addRow;
            $source = preg_replace($pattern, $replacement, $source);
        }
        $event->setSource($source);

        // plg_product_class_imageのセット
        $parameters = $event->getParameters();
        /** @var FormView $classForm */
        $classForm = $parameters['classForm'];
        if (!isset($classForm->vars['value']['product_classes'])) {
            if (isset($classForm->children['product_classes'])) {
                $productClassesForm = $classForm->children['product_classes'];
                /** @var FormView $productClassForm */
                foreach ($productClassesForm as $productClassForm) {
                    /** @var ProductClass $ProductClass */
                    $ProductClass = $productClassForm->vars['value'];
                    $productClassId = $ProductClass->getId();
                    /** @var ProductClassImage $ProductClassImage */
                    $ProductClassImage = null;
                    if (!empty($productClassId)) {
                        $ProductClassImage = $this->app[APGPRODUCTCLASSIMAGE_REPOSITORY_PRODUCT_CLASS_IMAGE]->find($productClassId);
                        $ProductClass->product_class_image = $ProductClassImage;
                    }
                }
            }
        } else {
            $Product = $parameters['Product'];
            $productClasses = $classForm->vars['value']['product_classes'];
            if (!empty($productClasses)) {
                /** @var ProductClass $ProductClass */
                foreach ($productClasses as $ProductClass) {
                    $ClassCategory1 = $ProductClass->getClassCategory1();
                    $ClassCategory2 = $ProductClass->getClassCategory2();
                    $where = array(
                        'Product' => $Product,
                        'ClassCategory1' => $ClassCategory1,
                        'ClassCategory2' => $ClassCategory2,
                    );
                    /** @var ProductClassRepository $ProductClassRepository */
                    $ProductClassRepository = $this->app['orm.em']->getRepository('Eccube\Entity\ProductClass');
                    /** @var ProductClass $ProductClass */
                    $StoredProductClass = $ProductClassRepository->findOneBy($where);
                    if (!is_null($StoredProductClass)) {
                        $ProductClassImage = $this->app[APGPRODUCTCLASSIMAGE_REPOSITORY_PRODUCT_CLASS_IMAGE]->find($StoredProductClass->getId());
                    } else {
                        $StoredProductClass = new ProductClass();
                        $StoredProductClass->setProduct($Product);
                    }
                    if (empty($ProductClassImage)) {
                        $ProductClassImage = new ProductClassImage();
                        $ProductClassImage->setProductClass($StoredProductClass);
                    }
                    $ProductClass->product_class_image = $ProductClassImage;
                }
            }
        }
        /** @var ProductClassImageSettingRepository $productClassImageSettingRepository */
        $productClassImageSettingRepository = $this->app[APGPRODUCTCLASSIMAGE_REPOSITORY_PRODUCT_CLASS_IMAGE_SETTING];
        /** @var ProductClassImageSetting $ProductClassImageSetting */
        $ProductClassImageSetting = $productClassImageSettingRepository->getOrNew();
        $parameters['ProductClassImageSetting'] = $ProductClassImageSetting;
        $event->setParameters($parameters);

    }
}