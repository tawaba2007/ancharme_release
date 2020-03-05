<?php

namespace Plugin\CssEditor\Entity;

class CssEditor extends \Eccube\Entity\AbstractEntity
{
    private $id;
    private $created;
    private $text;
    private $file_name;

    public function getId()
    {
        return $this->id;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($id)
    {
        $this->created = $id;

        return $this;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($id)
    {
        $this->text = $id;

        return $this;
    }

    public function getFileName()
    {
        return $this->file_name;
    }

    public function setFileName($id)
    {
        $this->file_name = $id;

        return $this;
    }

}