<?php

namespace Plugin\OrderNumber\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class OrderNumber extends \Eccube\Entity\AbstractEntity
{
    private $id;
    private $order_id;
    private $order_number;

    public function getId()
    {
        return $this->id;
    }

    public function getOrderId()
    {
        return $this->order_id;
    }

    public function setOrderId($order_id)
    {
        $this->order_id = $order_id;

        return $this;
    }

    public function getOrderNumber()
    {
        return $this->order_number;
    }

    public function setOrderNumber($order_number)
    {
        $this->order_number = $order_number;

        return $this;
    }

}