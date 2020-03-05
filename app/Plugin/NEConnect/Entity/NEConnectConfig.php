<?php

namespace Plugin\NEConnect\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NEConnect
 */
class NEConnectConfig extends \Eccube\Entity\AbstractEntity
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $email_address;

    /**
     * @var string
     */
    private $api_key;

    /**
     * @var \DateTime
     */
    private $create_date;

    /**
     * @var \DateTime
     */
    private $update_date;

    /**
     * @var integer
     */
    private $creator_id;

    /**
     * @var integer
     */
    private $del_flg = 0;


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
     * Set email_address
     *
     * @param $emailAddress
     * @return $this
     */
    public function setEmailAddress($emailAddress)
    {
        $this->email_address = $emailAddress;

        return $this;
    }
    /**
     * Get email_address
     *
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->email_address;
    }

    /**
     * Set api_key
     *
     * @param $apiKey
     * @return $this
     */
    public function setApiKey($apiKey)
    {
        $this->api_key = $apiKey;

        return $this;
    }
    /**
     * Get api_key
     *
     * @return string
     */
    public function getApiKey()
    {
        return $this->api_key;
    }

    /**
     * Set create_date
     *
     * @param  \DateTime $createDate
     * @return $this
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
     * @return $this
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

    /**
     * Set creatorId  Creatorエンティティではない
     *
     * @param $creatorId
     * @return $this
     */
    public function setCreatorId($creatorId)
    {
        $this->creator_id = $creatorId;

        return $this;
    }
    /**
     * Get creatorId  Creatorエンティティではない
     *
     * @return int
     */
    public function getCreatorId()
    {
        return $this->creator_id;
    }

    /**
     * Set del_flg
     *
     * @param  integer $delFlg
     * @return $this
     */
    public function setDelFlg($delFlg)
    {
        $this->del_flg = $delFlg;

        return $this;
    }
    /**
     * Get del_flg
     *
     * @return integer
     */
    public function getDelFlg()
    {
        return $this->del_flg;
    }

}
