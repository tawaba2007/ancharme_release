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
use Eccube\Entity\ClassCategory;
use Eccube\Entity\Product;
use Eccube\Entity\ProductClass;
use Eccube\Event\EventArgs;
use Eccube\Repository\ProductClassRepository;
use Plugin\ApgProductClassImage\Entity\ProductClassImage;
use Plugin\ApgProductClassImage\Logic\BaseEventLogic;
use Plugin\ApgProductClassImage\Util\Paths;
use Plugin\ApgProductClassImage\Util\PluginUtil;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormInterface;

/**
 * Class ProductClassImageUploadLogic
 * @package Plugin\ApgProductClassImage\Logic\Event\Admin
 *
 * 商品規格画像を保存する処理
 */
class ProductClassImageUploadLogic extends BaseEventLogic
{

    public function execute(EventArgs $event)
    {
        /** @var Application $app */
        $app = $this->app;
        /** @var FormInterface $form */
        $form = $event->getArgument('form');
        // @todo 固定じゃなくて設定情報から取得するようにしたい
        $baseFilePath = $app['config']['user_data_realdir'];
        $baseFilePath = rtrim($baseFilePath, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;

        /** @var Form $formData */
        foreach ($form->get('product_classes') as $formData) {

            /** @var ProductClass $data */
            $ProductClass = $formData->getData();
            /** @var Product $Product */
            $Product = $ProductClass->getProduct();
            /** @var ClassCategory $ClassCategory1 */
            $ClassCategory1 = $ProductClass->getClassCategory1();
            /** @var ClassCategory $ClassCategory1 */
            $ClassCategory2 = $ProductClass->getClassCategory2();
            if (is_null($Product)
                && is_null($ClassCategory1)
                && is_null($ClassCategory2)) {
                continue;
            }
            if (is_null($Product)) {
                $productId = null;
            } else {
                $productId = $Product->getId();
            }
            $where = array(
                'Product' => $Product
            );
            $where['ClassCategory1'] = $ClassCategory1;
            $where['ClassCategory2'] = $ClassCategory2;

            /** @var ProductClassRepository $ProductClassRepository */
            $ProductClassRepository = $this->app['orm.em']->getRepository('Eccube\Entity\ProductClass');
            /** @var ProductClass $ProductClass */
            $ProductClass = $ProductClassRepository->findOneBy($where);
            if (is_null($ProductClass)) {
                continue;
            }
            $id = $ProductClass->getId();
            $basePath = Paths::productClassImageBasePath();
            $deleteFlag = false;
            $data = $formData['file_delete_flag']->getData();
            if (!empty($data)) {
                // 画像削除
                $fileName = null;
                $deleteFlag = true;
            } else {
                /** @var Form $file */
                $file = $formData['file_name'];
                $fileName = $file->getData();
                if (!empty($fileName)) {
                    $org = $basePath . Paths::productImagesRealPath($productId, true) . $fileName;
                    $dist = $basePath . Paths::productImagesRealPath($productId, false) . $fileName;
                    $fileSystem = new Filesystem();
                    if ($fileSystem->exists($org)) {
                        $fileSystem->copy($org, $dist, true);
                        $fileSystem->remove($org);
                    }
                }
            }

            /** @var ProductClassImage $ProductClassImage */
            $ProductClassImage = PluginUtil::getPluginRepository($app, 'product_class_image')->find($id);
            if (is_null($ProductClassImage)) {
                $ProductClassImage = new ProductClassImage();
            } else {

                // 既存を削除
                if ((!is_null($fileName) || $deleteFlag) && !empty($productId)) {
                    $fileSystem = new Filesystem();
                    $deleteFilePath = $baseFilePath . Paths::productImagesRealPath($productId) . $ProductClassImage->getFileName();
                    if ($fileSystem->exists($deleteFilePath)) {
                        $fileSystem->remove($deleteFilePath);
                    }
                } else {
                    $fileName = $ProductClassImage->getFileName();
                }
            }
            if (!is_null($fileName)) {
                $ProductClassImage
                    ->setId($id)
                    ->setFileName($fileName)
                    ->setProductClass($ProductClass);
                $app['orm.em']->persist($ProductClassImage);
                $app['orm.em']->flush($ProductClassImage);
            } else {
                $productClassImage = $ProductClassImage->getId();
                if (!empty($productClassImage)) {
                    $app['orm.em']->remove($ProductClassImage);
                    $app['orm.em']->flush($ProductClassImage);
                }
            }

        }
    }
}
