<?php

/*
 * This file is part of the ApgProductClassImage
 *
 * Copyright (C) 2018 ARCHIPELAGO Inc.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\ApgProductClassImage\Entity;

use Eccube\Entity\ProductClass;
use Plugin\ApgProductClassImage\Util\Paths;

class ProductClassImage extends \Eccube\Entity\AbstractEntity
{

    /** @var int $id */
    private $id;

    /** @var string ファイル名 */
    private $file_name;

    /** @var ProductClass $ProductClass */
    private $ProductClass;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return ProductClassImage
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->file_name;
    }

    /**
     * @param string $file_name
     * @return ProductClassImage
     */
    public function setFileName($file_name)
    {
        $this->file_name = $file_name;
        return $this;
    }

    /**
     * @return ProductClass
     */
    public function getProductClass()
    {
        return $this->ProductClass;
    }

    /**
     * @param ProductClass $ProductClass
     * @return ProductClassImage
     */
    public function setProductClass($ProductClass)
    {
        $this->ProductClass = $ProductClass;
        return $this;
    }

    /**
     * 画像のURLを返す
     * @param null $fileName
     * @param bool $temporary
     * @return string
     */
    public function getImageUrl($fileName = null, $temporary = false)
    {
        if (empty($fileName)) {
            $fileName = $this->getFileName();
        }
        if (empty($fileName)) {
            return '';
        } else {
            return Paths::productClassImagesUrl($this->getProductClass()->getProduct()->getId(), $fileName, $temporary);
        }
    }

}