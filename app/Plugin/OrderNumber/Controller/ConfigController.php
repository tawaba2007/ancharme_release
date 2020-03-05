<?php

/*
 * This file is part of the OrderNumber
 *
 * Copyright (C) 2018 iforcom
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\OrderNumber\Controller;

use Eccube\Application;
use Symfony\Component\HttpFoundation\Request;

class ConfigController
{

    /**
     * OrderNumber用設定画面
     *
     * @param Application $app
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Application $app, Request $request)
    {

        $form = $app['form.factory']->createBuilder('ordernumber_config')->getForm();
        $OrderNumberFormat = $app['eccube.plugin.order_number.repository.order_number_format']->find(1);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $OrderNumberFormat = $app['eccube.plugin.order_number.repository.order_number_format']->find(1);

            if (is_null($OrderNumberFormat)) {
                $OrderNumberFormat = new \Plugin\OrderNumber\Entity\OrderNumberFormat();
                $OrderNumberFormat
                    ->setId(1)
                    ->setFrontFormatType($data['front_format_type'])
                    ->setRearFormatType($data['rear_format_type'])
                    ->setDigit($data['digit']);
            } else {
                $OrderNumberFormat
                    ->setFrontFormatType($data['front_format_type'])
                    ->setRearFormatType($data['rear_format_type'])
                    ->setDigit($data['digit']);
            }

            $app['orm.em']->persist( $OrderNumberFormat );
            try {
                $app['orm.em']->flush( $OrderNumberFormat );
                $app->addSuccess('保存しました', 'admin');
            } catch (\Exception $e) {
                $app->addError('admin.register.failed', 'admin');
            }
        } else {
            $OrderNumberFormat = $app['eccube.plugin.order_number.repository.order_number_format']->find(1);
            if (!is_null($OrderNumberFormat)) {
                $form->setData($OrderNumberFormat);
            }
        }

        return $app->render('OrderNumber/Resource/template/admin/config.twig', array(
            'form' => $form->createView(),
        ));
    }

}
