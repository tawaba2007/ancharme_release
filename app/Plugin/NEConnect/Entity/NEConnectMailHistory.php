<?php

namespace Plugin\NEConnect\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NEConnect
 */
class NEConnectMailHistory extends \Eccube\Entity\AbstractEntity
{

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getSubject();
    }

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $send_date;

    /**
     * @var string
     */
    private $send_to;

    /**
     * @var string
     */
    private $subject;

    /**
     * @var string
     */
    private $mail_body;

    /**
     * @var integer
     */
    private $order_id;


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
     * Set send_date
     *
     * @param \DateTime   $sendDate
     * @return NEConnectMailHistory
     */
    public function setSendDate($sendDate)
    {
        $this->send_date = $sendDate;

        return $this;
    }

    /**
     * Get send_date
     *
     * @return \DateTime
     */
    public function getSendDate()
    {
        return $this->send_date;
    }

    /**
     * Set send_to
     *
     * @param  string      $send_to
     * @return NEConnectMailHistory
     */
    public function setSendTo($send_to)
    {
        $this->send_to = $send_to;

        return $this;
    }

    /**
     * Get send_to
     *
     * @return string
     */
    public function getSendTo()
    {
        return $this->send_to;
    }

    /**
     * Set subject
     *
     * @param  string      $subject
     * @return NEConnectMailHistory
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set mail_body
     *
     * @param  string      $mailBody
     * @return NEConnectMailHistory
     */
    public function setMailBody($mailBody)
    {
        $this->mail_body = $mailBody;

        return $this;
    }

    /**
     * Get mail_body
     *
     * @return string
     */
    public function getMailBody()
    {
        return $this->mail_body;
    }

    /**
     * Set orderId  Orderエンティティではない
     *
     * @param $orderId
     * @return $this
     */
    public function setOrderId($orderId)
    {
        $this->order_id = $orderId;

        return $this;
    }

    /**
     * Get orderId  Orderエンティティではない
     *
     * @return int
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

}
