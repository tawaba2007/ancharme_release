<?php

/*
 * This file is part of the ApgProductClassImage
 *
 * Copyright (C) 2018 ARCHIPELAGO Inc.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\ApgProductClassImage\Util;

use Silex\Application as BaseApplication;

/**
 * Trait ApgProductClassImageTrait
 * @package Plugin\ApgProductClassImage\Traits
 *
 * 商品規格画像アップロードプラグインの共通処理
 */
class PluginUtil
{

    static public function pluginName()
    {
        $name = "apg_product_class_image";
        return $name;
    }

    static public function logicName($logicName)
    {
        return self::pluginName() . '.logic.' . $logicName;
    }

    static public function serviceName($serviceName)
    {
        return self::pluginName() . '.service.' . $serviceName;
    }

    static public function repositoryName($entityName)
    {
        return self::pluginName() . '.repository.' . $entityName;
    }

    static public function getPluginRepository(BaseApplication $app, $repositoryName)
    {
        $repositoryName = self::repositoryName($repositoryName);
        return $app[$repositoryName];
    }

}