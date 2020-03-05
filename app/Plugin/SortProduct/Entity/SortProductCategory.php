<?php

namespace Plugin\SortProduct\Entity;

use Doctrine\ORM\Mapping as ORM;

class SortProductCategory extends \Eccube\Entity\AbstractEntity
{
    private $id;
    private $category_id;
//    private $product_id;
    private $rank;


    public function getId()
    {
        return $this->id;
    }

    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
        return $this;
    }
    public function getCategoryId()
    {
        return $this->category_id;
    }

//    public function setProductId($product_id)
//    {
//        $this->product_id = $product_id;
//        return $this;
//    }
//    public function getProductId()
//    {
//        return $this->product_id;
//    }

    public function setRank($rank)
    {
        $this->rank = $rank;
        return $this;
    }
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * @var \Eccube\Entity\Product
     */
    private $Product;

    /**
     * get related product content.
     *
     * @return \Eccube\Entity\Product
     */
    public function getProduct()
    {
        return $this->Product;
    }

    /**
     * set related product product.
     *
     * @param \Eccube\Entity\Product $Product
     *
     * @return $this
     */
    public function setProduct(\Eccube\Entity\Product $Product)
    {
        $this->Product = $Product;

        return $this;
    }

}
