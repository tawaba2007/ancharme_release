<?php

namespace Plugin\ApgProductClassImage\Entity;

/**
 * ProductClassImageSetting
 */
class ProductClassImageSetting extends \Eccube\Entity\AbstractEntity
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $image_insert_type = 0;

    /**
     * @var integer
     */
    private $image_max_size = 2;

    /**
     * @var integer
     */
    private $image_real_path;

    /**
     * @var string
     */
    private $images_url;


    public function getImageMaxSizeUnitMb()
    {
        return $this->getImageMaxSize() * 1024 * 1024;
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return ProductClassImageSetting
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set image_insert_type
     *
     * @param integer $imageInsertType
     * @return ProductClassImageSetting
     */
    public function setImageInsertType($imageInsertType)
    {
        $this->image_insert_type = $imageInsertType;

        return $this;
    }

    /**
     * Get image_insert_type
     *
     * @return integer
     */
    public function getImageInsertType()
    {
        return $this->image_insert_type;
    }

    /**
     * Set image_max_size
     *
     * @param integer $imageMaxSize
     * @return ProductClassImageSetting
     */
    public function setImageMaxSize($imageMaxSize)
    {
        $this->image_max_size = $imageMaxSize;

        return $this;
    }

    /**
     * Get image_max_size
     *
     * @return integer
     */
    public function getImageMaxSize()
    {
        return $this->image_max_size;
    }

    /**
     * Set image_real_path
     *
     * @param integer $imageRealPath
     * @return ProductClassImageSetting
     */
    public function setImageRealPath($imageRealPath)
    {
        $this->image_real_path = $imageRealPath;

        return $this;
    }

    /**
     * Get image_real_path
     *
     * @return integer
     */
    public function getImageRealPath()
    {
        return $this->image_real_path;
    }

    /**
     * Set images_url
     *
     * @param string $imagesUrl
     * @return ProductClassImageSetting
     */
    public function setImagesUrl($imagesUrl)
    {
        $this->images_url = $imagesUrl;

        return $this;
    }

    /**
     * Get images_url
     *
     * @return string
     */
    public function getImagesUrl()
    {
        return $this->images_url;
    }
}
