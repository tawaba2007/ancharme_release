<?php

namespace Plugin\GoqsmilePlugin\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Config
 */
class Config extends \Eccube\Entity\AbstractEntity
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $app_id;

    /**
     * Set id
     *
     * @param integer $id
     * @return Config
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
     * Set app_id
     *
     * @param string $appId
     * @return Config
     */
    public function setAppId($appId)
    {
        $this->app_id = $appId;

        return $this;
    }

    /**
     * Get app_id
     *
     * @return string 
     */
    public function getAppId()
    {
        return $this->app_id;
    }
}
