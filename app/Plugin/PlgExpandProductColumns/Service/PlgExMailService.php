<?php

namespace Plugin\PlgExpandProductColumns\Service;
use Eccube\Entity\OrderDetail;
use Eccube\Event\EccubeEvents;
use Eccube\Event\EventArgs;
use Eccube\Service\MailService;
use Plugin\PlgExpandProductColumns\Entity\PlgExpandProductColumns;
use Plugin\PlgExpandProductColumns\Entity\PlgExpandProductColumnsValue;

class PlgExMailService extends MailService
{
    /**
     * Send admin order mail.
     *
     * @param $Order 受注情報
     * @param $formData 入力内容
     */
    public function sendAdminOrderMail(\Eccube\Entity\Order $Order, $formData)
    {
        $body = $this->app->renderView('Mail/order.twig', array(
            'header' => $formData['header'],
            'footer' => $formData['footer'],
            'Order' => $Order,
            '__EX_PRODUCT_LIST' => $this->getExColmnValuesInfo($Order)
        ));

        $message = \Swift_Message::newInstance()
            ->setSubject('[' . $this->BaseInfo->getShopName() . '] ' . $formData['subject'])
            ->setFrom(array($this->BaseInfo->getEmail01() => $this->BaseInfo->getShopName()))
            ->setTo(array($Order->getEmail()))
            ->setBcc($this->BaseInfo->getEmail01())
            ->setReplyTo($this->BaseInfo->getEmail03())
            ->setReturnPath($this->BaseInfo->getEmail04())
            ->setBody($body);

        $event = new EventArgs(
            array(
                'message' => $message,
                'Order' => $Order,
                'formData' => $formData,
                'BaseInfo' => $this->BaseInfo,
            ),
            null
        );
        $this->app['eccube.event.dispatcher']->dispatch(EccubeEvents::MAIL_ADMIN_ORDER, $event);

        $this->app->mail($message);
        return $message;
    }
    
    /**
     * Send order mail.
     *
     * @param \Eccube\Entity\Order $Order 受注情報
     * @return string
     */
    public function sendOrderMail(\Eccube\Entity\Order $Order)
    {
        $MailTemplate = $this->app['eccube.repository.mail_template']->find(1);

        $body = $this->app->renderView($MailTemplate->getFileName(), array(
            'header' => $MailTemplate->getHeader(),
            'footer' => $MailTemplate->getFooter(),
            'Order' => $Order,
            '__EX_PRODUCT_LIST' => $this->getExColmnValuesInfo($Order)
        ));

        $message = \Swift_Message::newInstance()
            ->setSubject('[' . $this->BaseInfo->getShopName() . '] ' . $MailTemplate->getSubject())
            ->setFrom(array($this->BaseInfo->getEmail01() => $this->BaseInfo->getShopName()))
            ->setTo(array($Order->getEmail()))
            ->setBcc($this->BaseInfo->getEmail01())
            ->setReplyTo($this->BaseInfo->getEmail03())
            ->setReturnPath($this->BaseInfo->getEmail04())
            ->setBody($body);

        $event = new EventArgs(
            array(
                'message' => $message,
                'Order' => $Order,
                'MailTemplate' => $MailTemplate,
                'BaseInfo' => $this->BaseInfo,
            ),
            null
        );
        $this->app['eccube.event.dispatcher']->dispatch(EccubeEvents::MAIL_ORDER, $event);

        $this->app->mail($message);
        return $message;

    }
    

    private function getExColmnValuesInfo(\Eccube\Entity\Order $Order)
    {
        // 取得対象の product_idを全て取得
        $product_ids = array_reduce($Order->getOrderDetails()->toArray(), function($reduced, $detail) {
            /**
             * @var $detail OrderDetail
             */
            $Product = $detail->getProduct();
            if (!is_null($Product)) {
                $reduced[] = $Product->getId();
            }
            return $reduced;
        });

        $product_ex_list = array();
        if (!empty($product_ids)) {
            $value_repository = $this->app['orm.em']->getRepository('\Plugin\PlgExpandProductColumns\Entity\PlgExpandProductColumnsValue');
            $column_repository = $this->app['orm.em']->getRepository('\Plugin\PlgExpandProductColumns\Entity\PlgExpandProductColumns');

            $Values = $value_repository->findBy(array(
                'productId' => $product_ids
            ));

            if (!empty($Values)) {
                $ex_values = array_reduce($Values, function($reduced, $Value) {
                    /**
                     * @var $Value PlgExpandProductColumnsValue
                     */
                    $column_id = $Value->getColumnId();
                    $product_id = $Value->getProductId();
                    $reduced[$product_id][$column_id] = $Value;
                    return $reduced;
                });

                $Columns = $column_repository->findAll();

                $ex_columns = array();
                if (!empty($Columns)) {
                    $ex_columns = array_reduce($Columns, function($reduced, $Column) {
                        /**
                         * @var $Column PlgExpandProductColumns
                         */
                        $reduced[$Column->getColumnId()] = $Column;
                        return $reduced;
                    });
                }

                // 情報を整理
                foreach ($ex_values as $product_id => $ex_value_list) {
                    $one_product_info = array();
                    foreach ($ex_value_list as $column_id => $Value) {
                        /**
                         * @var $Value PlgExpandProductColumnsValue
                         * @var $Column PlgExpandProductColumns
                         */
                        if (isset($ex_columns[$column_id])) {
                            $Column = $ex_columns[$column_id];

                            /*
                             * 配列系の値の場合、配列にしてから渡す
                             */
                            $value = $Value->getValue();
                            switch ($Column->getColumnType()) {
                                case EX_TYPE_IMAGE :
                                case EX_TYPE_CHECKBOX :
                                    if (empty($value)) {
                                        $value = '';
                                    } else {
                                        $value = explode(',', $value);
                                    }
                                    break;
                                default :
                                    $value = empty($value) ? '' : $value;
                            }

                            $one_product_info[$column_id] = array(
                                'id' => $column_id,
                                'name' => $Column->getColumnName(),
                                'value' => $value
                            );
                        }
                    }
                    // 何もセットされなかったColumn情報には空文字を入れておく
                    foreach ($ex_columns as $column_id => $Column) {
                        if (!isset($one_product_info[$column_id])) {
                            $one_product_info[$column_id] = array(
                                'id' => $column_id,
                                'name' => $Column->getColumnName(),
                                'value' => ''
                            );
                        }
                    }

                    $product_ex_list[$product_id] = $one_product_info;
                }
            }

        }
        return $product_ex_list;
    }
}
