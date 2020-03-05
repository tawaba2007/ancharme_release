<?php
/**
 * Copyright (c) 2016-present, Facebook, Inc.
 * All rights reserved.
 *
 * This source code is licensed under the BSD-style license found in the
 * LICENSE file in the root directory of this source tree. An additional grant
 * of patent rights can be found in the PATENTS file in the code directory.
 */

namespace Plugin\FacebookAdsToolbox\Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Eccube\Util\EntityUtil;

/**
 * FacebookAdsToolbox
 */
class FacebookAdsToolbox extends \Eccube\Entity\AbstractEntity {

    /**
     *
     * @var integer
     */
    private $id;

    /**
     *
     * @var string
     */
    private $fb_pixel;

    /**
     *
     * @var string
     */
    private $merchant_settings;

    /**
     *
     * @var \DateTime
     */
    private $create_date;

    /**
     *
     * @var \DateTime
     */
    private $update_date;

    /**
     * Constructor
     */
    public function __construct() {}

    /**
     * Get recommend product id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set recommend product id
     *
     * @param integer $recommend_product_id
     * @return Module
     */
    public function setId($id) {
        $this->id = $id;

        return $this;
    }

    /**
     * Get commend
     *
     * @return string
     */
    public function getFbPixel() {
        return $this->fb_pixel;
    }

    /**
     * Set comment
     *
     * @param
     *            string
     * @return Module
     */
    public function setFbPixel($pixel_id) {
        $this->fb_pixel = $pixel_id;

        return $this;
    }

    /**
     * Get commend
     *
     * @return string
     */
    public function getMerchantSettings() {
        return $this->merchant_settings;
    }

    /**
     * Set comment
     *
     * @param
     *            string
     * @return Module
     */
    public function setMerchantSettings($merchant_settings_id) {
        $this->merchant_settings = $merchant_settings_id;

        return $this;
    }

    /**
     * Set create_date
     *
     * @param \DateTime $createDate
     * @return Module
     */
    public function setCreateDate($createDate) {
        $this->create_date = $createDate;

        return $this;
    }

    /**
     * Get create_date
     *
     * @return \DateTime
     */
    public function getCreateDate() {
        return $this->create_date;
    }

    /**
     * Set update_date
     *
     * @param \DateTime $updateDate
     * @return Module
     */
    public function setUpdateDate($updateDate) {
        $this->update_date = $updateDate;

        return $this;
    }

    /**
     * Get update_date
     *
     * @return \DateTime
     */
    public function getUpdateDate() {
        return $this->update_date;
    }

}
