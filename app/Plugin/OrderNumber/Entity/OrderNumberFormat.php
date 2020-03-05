<?php

namespace Plugin\OrderNumber\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class OrderNumberFormat extends \Eccube\Entity\AbstractEntity
{
    private $id;
    private $front_format_type;
    private $rear_format_type;
    private $digit;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getFrontFormatType()
    {
        return $this->front_format_type;
    }

    public function setFrontFormatType($front_format_type)
    {
        $this->front_format_type = $front_format_type;

        return $this;
    }

    public function getRearFormatType()
    {
        return $this->rear_format_type;
    }

    public function setRearFormatType($rear_format_type)
    {
        $this->rear_format_type = $rear_format_type;

        return $this;
    }

    public function getDigit()
    {
        return $this->digit;
    }

    public function setDigit($digit)
    {
        $this->digit = $digit;

        return $this;
    }

}