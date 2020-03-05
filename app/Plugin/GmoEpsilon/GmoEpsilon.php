<?php

namespace Plugin\GmoEpsilon;

use Eccube\Common\Constant;
use Eccube\Event\RenderEvent;
use Eccube\Event\ShoppingEvent;
use Plugin\GmoEpsilon\Util\PaymentUtil;
use Plugin\GmoEpsilon\Service\Epsilon_Credit;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class GmoEpsilon
{

    private $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function onRenderShoppingBefore(FilterResponseEvent $event)
    {
        $Order = $this->app['eccube.repository.order']->findOneBy(array('pre_order_id' => $this->app['eccube.service.cart']->getPreOrderId()));

        if (!is_null($Order)) {
            $Payment = $Order->getPayment();
            $PaymentConfig = null;
            if (!is_null($Payment)) {
                $PaymentConfig = $this->app['eccube.plugin.epsilon.repository.payment_extension']->find($Payment->getId());
            }
            if (!is_null($PaymentConfig)) {
                // 現在のソースを取得
                $source = $event->getResponse()->getContent();

                // DOMDocumentのエラー制御
                libxml_use_internal_errors(true);

                // DOMDocumentを用いてソースを取得する
                $dom = new \DOMDocument();
                $dom->loadHTML('<?xml encoding="UTF-8">' . $source);
                $dom->encoding = "UTF-8";

                // ソースを結合したい部分を取得
                $domElements = $dom->getElementsByTagName("*");
                for ($i = 0; $i < $domElements->length; $i++) {
                    if (@$domElements->item($i)->attributes->getNamedItem('id')->nodeValue == "order-button") {
                        $elements[] = $domElements->item($i);
                    }
                }

                if (!empty($elements)) {
                    // 購入ボタンを変更
                    $objUtil = new PaymentUtil($this->app);
                    $PaymentExtension = $objUtil->getPaymentTypeConfig($Order->getPayment()->getId());
                    $template = $dom->createDocumentFragment();
                    $template->appendXML($this->app['twig']->render('GmoEpsilon/Twig/shopping/next_cart_button.twig',
                        array('button_comment' => '次へ')
                    ));

                    $elements[0]->parentNode->replaceChild($template, $elements[0]);
                    $source = $event->getResponse()->setContent($dom->saveHTML());
                }
            }
        }
    }

    public function onControllerShoppingConfirmBefore($event = null)
    {
        // カートチェック
        if (!$this->app['eccube.service.cart']->isLocked()) {
            // カートが存在しない、カートがロックされていない時はエラー
            return $this->app->redirect($this->app->url('cart'));
        }

        $Order = $this->app['eccube.service.shopping']->getOrder($this->app['config']['order_processing']);
        if (!$Order) {
            $this->app->addError('front.shopping.order.error');
            return $this->app->redirect($this->app->url('shopping_error'));
        }

        // form作成
        $form = $this->app['eccube.service.shopping']->getShippingForm($Order);
        if ('POST' === $this->app['request']->getMethod()) {
            $form->handleRequest($this->app['request']);
            if ($form->isValid()) {
                $formData = $form->getData();
                $PaymentExtension = $this->app['eccube.plugin.epsilon.repository.payment_extension']->find($formData['payment']->getId());

                if (!is_null($PaymentExtension)) {
                    // 受注情報、配送情報を更新（決済処理中として更新する）
                    $this->app['eccube.service.order']->setOrderUpdate($this->app['orm.em'], $Order, $formData);

                    $Order->setOrderStatus($this->app['eccube.repository.order_status']->find($this->app['config']['order_pending']));
                    $this->app['orm.em']->persist($Order);
                    $this->app['orm.em']->flush();

                    // バージョンアップに伴う対応。
                    if (version_compare('3.0.11', Constant::VERSION, '<=')) {
                    	// 3.0.11以降
	                    $response = $this->app->redirect($this->app->url('epsilon_shopping_payment'));
	                    $event->setResponse($response);
	                    return;
                    } else {
                    	// 3.0.10以前
	                    header("Location: " . $this->app->url('epsilon_shopping_payment'));
	                    exit;
                    }
                }
            }
        }
    }

    public function onRenderShoppingCompleteBefore(FilterResponseEvent $event)
    {
        $orderId = $this->app['session']->get('eccube.plugin.epsilon.orderId');
        if ($orderId == null) {
            return;
        }

        $orderRep = $this->app['orm.em']->getRepository('\Eccube\Entity\Order');
        $Order = $orderRep->findOneBy(array('id' => $orderId));
        if ($Order == null) {
            return;
        }

        $PaymentExtension = $this->app['eccube.plugin.epsilon.repository.payment_extension']->find($Order->getPayment()->getId());
	    $paymentTypeId = $PaymentExtension->getPaymentTypeId();
        if ($paymentTypeId != $this->app['config']['GmoEpsilon']['const']['PAY_ID_CONVENI'] &&
                $paymentTypeId != $this->app['config']['GmoEpsilon']['const']['PAY_ID_PAYEASY']) {
            $this->app['session']->set('eccube.plugin.epsilon.orderId', null);
            return;
        }

        $source = $event->getResponse()->getContent();
        libxml_use_internal_errors(true);
        $dom = new \DOMDocument();
        $dom->loadHTML('<?xml encoding="UTF-8">' . $source);
        $dom->encoding = "UTF-8";

        $Elements = $dom->getElementsByTagName("*");
        $beforeNode = null;
        for ($i = 0; $i < $Elements->length; $i++) {
            if (@$Elements->item($i)->attributes->getNamedItem('class')->nodeValue == "complete_message") {
                // Position to insert HTML
                $beforeNode = $Elements->item($i);
            }
        }

        if (!is_null($beforeNode)) {
            $appendTwig = 'GmoEpsilon/Twig/shopping/shopping_complete_add.twig';
            $OrderExtension = $this->app['eccube.plugin.epsilon.repository.order_extension']->findOneBy(array('id' => $orderId));
            $arrOther = unserialize($OrderExtension->getPaymentInfo());

            // Render insert HTML
            $insert = $this->app['twig']->render($appendTwig, array('arrOther' => $arrOther));
            $template = $dom->createDocumentFragment();
            $template->appendXML($insert);
            $beforeNode->appendChild($template);
            $event->getResponse()->setContent($dom->saveHTML());
        }

        $this->app['session']->set('eccube.plugin.epsilon.orderId', null);
    }

    public function onRenderAdminOrderEditBefore(FilterResponseEvent $event) {
        $orderId = $this->app['request']->get('id');
        if ($orderId == null) {
            return;
        }

        $OrderExtension = $this->app['eccube.plugin.epsilon.repository.order_extension']->find($orderId);
        if ($OrderExtension == null) {
            return;
        }

        $regularOrderId = $OrderExtension->getRegularOrderId();
        if ($regularOrderId == null) {
            return;
        }

        $source = $event->getResponse()->getContent();
        libxml_use_internal_errors(true);
        $dom = new \DOMDocument();
        $dom->loadHTML('<?xml encoding="UTF-8">' . $source);
        $dom->encoding = "UTF-8";

        $Elements = $dom->getElementsByTagName("*");
        $beforeNode = null;
        for ($i = 0; $i < $Elements->length; $i++) {
            if (@$Elements->item($i)->attributes->getNamedItem('class')->nodeValue == "col_inner") {
                // Position to insert HTML
                $beforeNode = $Elements->item($i);
            }
        }

        if (!is_null($beforeNode)) {
            $appendTwig = 'GmoEpsilon/Twig/admin/Order/edit_add.twig';
            $RegularOrder = $this->app['eccube.plugin.epsilon.repository.regular_order']->find($regularOrderId);
            // Render insert HTML
            $insert = $this->app['twig']->render($appendTwig, array('RegularOrder' => $RegularOrder));
            $template = $dom->createDocumentFragment();
            $template->appendXML($insert);
            $beforeNode->appendChild($template);
            $event->getResponse()->setContent($dom->saveHTML());
        }
    }

    public function onControllerAdminOrderEditBefore() {
        $orderId = $this->app['request']->get('id');
        if ($orderId == null) {
            return;
        }

        $OrderExtension = $this->app['eccube.plugin.epsilon.repository.order_extension']->find($orderId);
        if ($OrderExtension == null) {
            return;
        }

        $regularOrderId = $OrderExtension->getRegularOrderId();
        if ($regularOrderId == null) {
            return;
        }

        $softDeleteFilter = $this->app['orm.em']->getFilters()->getFilter('soft_delete');
        $softDeleteFilter->setExcludes(array(
            'Eccube\Entity\Order'
        ));
    }

}

 ?>
