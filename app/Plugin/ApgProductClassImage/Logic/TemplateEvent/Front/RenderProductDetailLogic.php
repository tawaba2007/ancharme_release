<?php

/*
 * This file is part of the ApgProductClassImage
 *
 * Copyright (C) 2018 ARCHIPELAGO Inc.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\ApgProductClassImage\Logic\TemplateEvent\Front;


use Eccube\Entity\Product;
use Eccube\Entity\ProductClass;
use Eccube\Event\TemplateEvent;
use Plugin\ApgProductClassImage\Domain\ClassImageInsertType;
use Plugin\ApgProductClassImage\Entity\ProductClassImageSetting;
use Plugin\ApgProductClassImage\Logic\BaseTemplateEventLogic;
use Plugin\ApgProductClassImage\Repository\ProductClassImageRepository;
use Plugin\ApgProductClassImage\Repository\ProductClassImageSettingRepository;
use Plugin\ApgProductClassImage\Util\PluginUtil;
use Plugin\ApgProductClassImage\Util\ViewHelper;
use Silex\Application;

/**
 * Class RenderProductDetailLogic
 * @package Plugin\ApgProductClassImage\Logic\TemplateEvent\Front
 *
 * 商品詳細ページが表示されるときのレンダー処理
 */
class RenderProductDetailLogic extends BaseTemplateEventLogic
{

    public function execute(TemplateEvent $event)
    {
        $parameter = $event->getParameters();
        $source = $event->getSource();

        /** @var Application $app */
        $app = $this->app;
        /** @var Product $Product */
        $Product = $parameter['Product'];
        $ProductClassImages = array();
        /** @var ProductClassImageRepository $productClassImageRepository */
        $productClassImageRepository = PluginUtil::getPluginRepository($app, 'product_class_image');
        /** @var ProductClass $ProductClass */
        foreach ($Product->getProductClasses() as $ProductClass) {
            $ProductClassImage = $productClassImageRepository->find($ProductClass->getId());
            if (!empty($ProductClassImage)) {
                $ProductClassImages[] = $ProductClassImage;
            }
        }
        $parameter['ProductClassImages'] = $ProductClassImages;

        /** @var ProductClassImageSettingRepository $productClassImageSettingRepository */
        $productClassImageSettingRepository = $app[APGPRODUCTCLASSIMAGE_REPOSITORY_PRODUCT_CLASS_IMAGE_SETTING];
        /** @var ProductClassImageSetting $ProductClassImageSetting */
        $ProductClassImageSetting = $productClassImageSettingRepository->getOrNew();
        $parameter['ProductClassImageSetting'] = $ProductClassImageSetting;

        $event->setParameters($parameter);

        $twig = $this->app['twig'];

        // js
        if ($ProductClassImageSetting->getImageInsertType() === ClassImageInsertType::UNDER_SELECT_CLASS) {
            $insertSource = $twig->getLoader()->getSource('ApgProductClassImage/Resource/template/front/render_product_class_images_js1.twig');
            $source = ViewHelper::insertJs($source, $insertSource);
        } elseif ($ProductClassImageSetting->getImageInsertType() === ClassImageInsertType::SLIDERS) {
            $insertSource = $twig->getLoader()->getSource('ApgProductClassImage/Resource/template/front/render_product_class_images_js2.twig');
            $source = ViewHelper::insertJs($source, $insertSource);
        }

        // data
        /** @var ProductClassImageSettingRepository $productClassImageSettingRepository */
        $productClassImageSettingRepository = $app[APGPRODUCTCLASSIMAGE_REPOSITORY_PRODUCT_CLASS_IMAGE_SETTING];
        /** @var ProductClassImageSetting $ProductClassImageSetting */
        $ProductClassImageSetting = $productClassImageSettingRepository->getOrNew();
        if ($ProductClassImageSetting->getImageInsertType() === ClassImageInsertType::UNDER_SELECT_CLASS) {
            $pattern = '|id="detail_cart_box__cart_class_category_id"(.*?)<\/ul>|s';
            $addRow = $twig->getLoader()->getSource('ApgProductClassImage/Resource/template/front/render_product_class_images1.twig');
            if (preg_match($pattern, $source, $matches, PREG_OFFSET_CAPTURE)) {
                $replacement = $matches[1][0] . $addRow;
                $source = preg_replace($pattern, $replacement, $source);
            }
        } elseif ($ProductClassImageSetting->getImageInsertType() === ClassImageInsertType::SLIDERS) {
            $pattern = '/{% if Product.ProductImage\|length > 0 %}(.*?){% endif %}/s';
            $addRow = $twig->getLoader()->getSource('ApgProductClassImage/Resource/template/front/render_product_class_images2.twig');
            if (preg_match($pattern, $source, $matches, PREG_OFFSET_CAPTURE)) {
                $replacement = $matches[0][0] . $addRow;
                $source = preg_replace($pattern, $replacement, $source);
            }
        }
        $event->setSource($source);

    }
}