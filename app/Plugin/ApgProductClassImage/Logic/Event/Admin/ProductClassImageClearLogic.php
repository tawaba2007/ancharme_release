<?php

/*
 * This file is part of the ApgProductClassImage
 *
 * Copyright (C) 2018 ARCHIPELAGO Inc.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\ApgProductClassImage\Logic\Event\Admin;


use Eccube\Application;
use Eccube\Entity\Product;
use Eccube\Entity\ProductClass;
use Eccube\Event\EventArgs;
use Plugin\ApgProductClassImage\Entity\ProductClassImage;
use Plugin\ApgProductClassImage\Logic\BaseEventLogic;
use Plugin\ApgProductClassImage\Repository\ProductClassImageRepository;
use Plugin\ApgProductClassImage\Util\PluginUtil;
use Plugin\ApgProductClassImage\Util\Paths;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Form\Form;

/**
 * Class ProductClassImageClearLogic
 * @package Plugin\ApgProductClassImage\Logic\Event\Admin
 *
 * 商品規格が初期化されたときに実行
 */
class ProductClassImageClearLogic extends BaseEventLogic
{

    public function execute(EventArgs $event)
    {
        /** @var Application $app */
        $app = $this->app;
        /** @var Product $Product */
        $Product = $event->getArgument('Product');
        /** @var Form $formData */
        $baseFilePath = Paths::productClassImageBasePath();
        $dirPath = Paths::productImagesRealPath($Product->getId());
        $fileSystem = new Filesystem();
        $fileSystem->remove($baseFilePath . $dirPath);

        /** @var ProductClassImageRepository $ProductClassImageRepository */
        $ProductClassImageRepository = PluginUtil::getPluginRepository($app, 'product_class_image');
        /** @var ProductClass $ProductClass */
        foreach ($Product->getProductClasses() as $ProductClass) {
            /** @var ProductClassImage $ProductClassImage */
            $ProductClassImage = $ProductClassImageRepository->find($ProductClass->getId());
            if (!empty($ProductClassImage)) {
                $app['orm.em']->remove($ProductClassImage);
                $app['orm.em']->flush($ProductClassImage);
            }
        }
    }
}