<?php

namespace Plugin\SortProduct\Entity;

use Doctrine\ORM\Mapping as ORM;

class SortProductConfig extends \Eccube\Entity\AbstractEntity
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $category_mode = \Eccube\Common\Constant::DISABLED;

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
    private $del_flg = \Eccube\Common\Constant::DISABLED;

    /**
     * @var \Eccube\Entity\Member
     */
    private $Creator;


    /**
     * Set stock_unlimited
     *
     * @param  integer      $category_mode
     * @return SortProductConfig
     */
    public function setCategoryMode($category_mode)
    {
        $this->category_mode = $category_mode;

        return $this;
    }

    /**
     * Get category_mode
     *
     * @return integer
     */
    public function getCategoryMode()
    {
        return $this->category_mode;
    }


    public function getId()
    {
        return $this->id;
    }

    /**
     * Set create_date
     *
     * @param  \DateTime    $createDate
     * @return SortProductConfig
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
     * @param  \DateTime    $updateDate
     * @return SortProductConfig
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
     * Set del_flg
     *
     * @param  integer      $delFlg
     * @return SortProductConfig
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

    /**
     * Set Creator
     *
     * @param  \Eccube\Entity\Member $creator
     * @return SortProductConfig
     */
    public function setCreator(\Eccube\Entity\Member $creator)
    {
        $this->Creator = $creator;

        return $this;
    }

    /**
     * Get Creator
     *
     * @return \Eccube\Entity\Member
     */
    public function getCreator()
    {
        if (\Eccube\Util\EntityUtil::isEmpty($this->Creator)) {
            return null;
        }
        return $this->Creator;
    }

}
