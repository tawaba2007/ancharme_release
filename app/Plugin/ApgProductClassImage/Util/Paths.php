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


use Eccube\Application;

/**
 * プラグインで必要なパス情報をまとめたクラス
 * Class Paths
 * @package Plugin\ApgProductClassImage\Util
 */
class Paths
{

    /**
     * プラグインで利用する画像を保存するベースとなる物理パスを返す
     * @param null $app
     * @return string
     */
    static public function productClassImageBasePath($app = null)
    {
        if (is_null($app)) {
            $app = Application::getInstance();
        }
        $baseFilePath = $app['config']['user_data_realdir'];
        return rtrim($baseFilePath, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;

    }

    /**
     * 商品規格画像を保存する物理パスを返す
     * @param $productId
     * @param bool $temporary 一時保存のバスを設定する場合は、trueを指定
     * @return string
     */
    static public function productImagesRealPath($productId, $temporary = false)
    {
        if ($temporary) {
            return 'product_class' . DIRECTORY_SEPARATOR . $productId . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR;
        } else {
            return 'product_class' . DIRECTORY_SEPARATOR . $productId . DIRECTORY_SEPARATOR;
        }
    }


    /**
     * 商品規格画像のホストを返す
     * @return string
     */
    static public function productClassImageHost()
    {
        // @TODO 設定できるように
        return '';
    }

    static public function productClassImageBaseUrl($app = null)
    {
        if (is_null($app)) {
            $app = Application::getInstance();
        }
        $baseUrl = $app['config']['user_data_urlpath'] . '/';
        return $baseUrl;

    }

    /**
     * 商品規格画像を保存するURLを返す
     * @param $productId
     * @param bool $temporary 一時保存のバスを設定する場合は、trueを指定
     * @return string
     */
    static public function productClassImagesUrl($productId, $fileName, $temporary = false)
    {
        $host = self::productClassImageHost();
        $baseUrl = self::productClassImageBaseUrl();
        if ($temporary) {
            return $host . $baseUrl . 'product_class/' . $productId . '/temp/' . $fileName;
        } else {
            return $host . $baseUrl . 'product_class/' . $productId . '/' . $fileName;
        }
    }

}