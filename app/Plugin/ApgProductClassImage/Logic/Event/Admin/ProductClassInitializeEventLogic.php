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


use Eccube\Event\EventArgs;
use Plugin\ApgProductClassImage\Entity\EnhancedProductClass;
use Plugin\ApgProductClassImage\Entity\ProductClassImage;
use Plugin\ApgProductClassImage\Form\AdminProductClassImageBuilder;
use Plugin\ApgProductClassImage\Logic\BaseEventLogic;

/**
 * Class ProductClassInitializeEventLogic
 * @package Plugin\ApgProductClassImage\Logic\Event\Admin
 *
 * 商品規格画面が表示されるときの初期処理
 */
class ProductClassInitializeEventLogic extends BaseEventLogic
{

    public function execute(EventArgs $event)
    {
        /** @var array $ProductClasses */
        $ProductClasses = $event->getArgument('ProductClasses');
        /** @var $ProductClasses $ProductClass */
        foreach ($ProductClasses as $ProductClass) {
            /**
             * product_class_image を初期化。
             * 保存データは、RenderProductClassLogic で設定される
             * @see RenderProductClassLogic
             */
            $ProductClass->product_class_image = new ProductClassImage();
        }

    }
}