<?php

namespace Plugin\GmoEpsilon\Service;

use Eccube\Application;

class GmoEpsilon_MailService
{
    /** @var \Eccube\Application */
    public $app;


    /** @var \Eccube\Entity\BaseInfo */
    public $BaseInfo;

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->BaseInfo = $app['eccube.repository.base_info']->get();
    }

    /**
     * Send order mail.
     *
     * @param $Order 受注情報
     */
    public function sendOrderMail(\Eccube\Entity\Order $Order, $arrOther)
    {
        $defaultMailTemplate = $this->app['eccube.repository.mail_template']->find(1);

        $body = $this->app->renderView('GmoEpsilon/Twig/mail/epsilon_order.twig', array(
            'header' => $defaultMailTemplate->getHeader(),
            'footer' => $defaultMailTemplate->getFooter(),
            'Order' => $Order,
            'arrOther' => $arrOther,
        ));

        $message = \Swift_Message::newInstance()
            ->setSubject('[' . $this->BaseInfo->getShopName() . '] ' . $defaultMailTemplate->getSubject())
            ->setFrom(array($this->BaseInfo->getEmail01() => $this->BaseInfo->getShopName()))
            ->setTo(array($Order->getEmail()))
            ->setBcc($this->BaseInfo->getEmail01())
            ->setReplyTo($this->BaseInfo->getEmail03())
            ->setReturnPath($this->BaseInfo->getEmail04())
            ->setBody($body);

        $this->app->mail($message);

        return $message;
    }

}
