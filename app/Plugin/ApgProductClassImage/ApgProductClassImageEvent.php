<?php

/*
 * This file is part of the ApgProductClassImage
 *
 * Copyright (C) 2018 ARCHIPELAGO Inc.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace Plugin\ApgProductClassImage;

use Eccube\Application;
use Eccube\Event\EventArgs;
use Eccube\Event\TemplateEvent;
use Plugin\ApgProductClassImage\Logic\Event\Admin\ProductClassImageClearLogic;
use Plugin\ApgProductClassImage\Logic\Event\Admin\ProductClassImageUploadLogic;
use Plugin\ApgProductClassImage\Logic\Event\Admin\ProductClassInitializeEventLogic;
use Plugin\ApgProductClassImage\Logic\TemplateEvent\Front\RenderProductDetailLogic;

class ApgProductClassImageEvent
{

    /** @var  \Eccube\Application $app */
    private $app;

    /**
     * ApgProductClassImageEvent constructor.
     *
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * [Admin]商品規格編集画面表示
     * @param EventArgs $event
     *
     * @see ProductClassInitializeEventLogic
     */
    public function onAdminProductClassIndexIndex(EventArgs $event)
    {
        $this->app[APGPRODUCTCLASSIMAGE_LOGIC_ADMIN_PRODUCT_CLASS_INITIALIZE]->execute($event);
    }

    /**
     * [Admin]商品規格ページ表示
     * @param TemplateEvent $event
     *
     * @see RenderProductClassLogic
     */
    public function onRenderAdminProductProductClass(TemplateEvent $event)
    {
        $this->app[APGPRODUCTCLASSIMAGE_LOGIC_ADMIN_PRODUCT_CLASS_RENDER]->execute($event);
    }

    /**
     * [Admin]商品規格の追加／更新
     * @param EventArgs $event
     *
     * @see ProductClassImageUploadLogic
     */
    public function onAdminProductClassEditComplete(EventArgs $event)
    {
        $this->app[APGPRODUCTCLASSIMAGE_LOGIC_ADMIN_PRODUCT_CLASS_IMAGE_UPLOAD]->execute($event);
    }

    /**
     * [Admin]商品規格の削除
     * @param EventArgs $event
     * @see ProductClassImageClearLogic
     */
    public function onAdminProductClassEditDelete(EventArgs $event)
    {
        $this->app[APGPRODUCTCLASSIMAGE_LOGIC_ADMIN_PRODUCT_CLASS_IMAGE_CLEAR]->execute($event);
    }

    /**
     * [Front]商品詳細情報表示
     * @param EventArgs $event
     * @see RenderProductDetailLogic
     */
    public function onRenderFrontProductDetail(TemplateEvent $event)
    {
        $this->app[APGPRODUCTCLASSIMAGE_LOGIC_FRONT_PRODUCT_DETAIL_RENDER]->execute($event);
    }

}


