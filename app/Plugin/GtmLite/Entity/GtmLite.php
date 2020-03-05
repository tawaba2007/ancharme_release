<?php
/*
 * GtmLite: Google Tag Manager コンテナタグ設置プラグイン
 * Copyright (C) 2017 Freischtide Inc. All Rights Reserved.
 * http://freischtide.tumblr.com/
 *
 * License: see LICENSE.txt
 */

namespace Plugin\GtmLite\Entity;

class GtmLite extends \Eccube\Entity\AbstractEntity
{
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $tid;

    /**
     * @var integer
     */
    private $tag;

    /**
     * @var integer
     */
    private $optional_events;

    /**
     * @var \DateTime
     */
    private $create_date;

    /**
     * @var \DateTime
     */
    private $update_date;

    /**
     * Constructor
     */
    public function __construct()
    {
    }

    /**
     * Set id
     *
     * @param  integer $id
     * @return Module
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
     * Set code
     *
     * @param  string $code
     * @return Module
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set name
     *
     * @param  string $name
     * @return Module
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set tid
     *
     * @param  string $tid
     * @return Module
     */
    public function setTid($tid)
    {
        $this->tid = $tid;

        return $this;
    }

    /**
     * Get tid
     *
     * @return string
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * Set tag 
     *
     * @param  integer $tag
     * @return Module
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get Tag
     *
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set optional_events
     *
     * @param  string $optional_events
     * @return Module
     */
    public function setOptionalEvents($optional_events)
    {
        $this->optional_events = $optional_events;

        return $this;
    }

    /**
     * Get optional_events
     *
     * @return string
     */
    public function getOptionalEvents()
    {
        return $this->optional_events;
    }

    /**
     * Set create_date
     *
     * @param  \DateTime $createDate
     * @return Module
     */
    public function setCreateDate($createDate)
    {
        $this->create_date = $createDate;

        return $this;
    }

    /**
     * Get create_date
     *
     * @return \DateTime
     */
    public function getCreateDate()
    {
        return $this->create_date;
    }

    /**
     * Set update_date
     *
     * @param  \DateTime $updateDate
     * @return Module
     */
    public function setUpdateDate($updateDate)
    {
        $this->update_date = $updateDate;

        return $this;
    }

    /**
     * Get update_date
     *
     * @return \DateTime
     */
    public function getUpdateDate()
    {
        return $this->update_date;
    }
}
