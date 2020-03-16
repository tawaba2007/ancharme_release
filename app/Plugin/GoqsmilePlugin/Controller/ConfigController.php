<?php

namespace Plugin\GoqsmilePlugin\Controller;

use Eccube\Application;
use Symfony\Component\HttpFoundation\Request;
use Plugin\GoqsmilePlugin\Entity\Config;

class ConfigController
{

    /**
     * GoqsmilePlugin用設定画面
     *
     * @param Application $app
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Application $app, Request $request)
    {
      if ("GET" === strtoupper($request->getMethod())) {
        $form = $app['form.factory']->createBuilder('goqsmileplugin_config')->getForm();
        // Set existing value to form.
        $app['orm.em']->getRepository(Config::class)->setEntityToForm($form);
        $form->handleRequest($request);
        return $app->render('GoqsmilePlugin/Resource/template/admin/config.twig', array(
            'form' => $form->createView(),
        ));
      }else if("POST" === strtoupper($request->getMethod())){

        $form = $app['form.factory']->createBuilder('goqsmileplugin_config')->getForm();
        $form->handleRequest($request);
        $data = $form->getData();
        if ($form->isSubmitted() && $form->isValid()) {
          $app['orm.em']->getRepository(Config::class)->replaceEntity($app, $request);
          $request_params = $request->request->get('goqsmileplugin_config');
        }
        return $app->render('GoqsmilePlugin/Resource/template/admin/config.twig', array(
          'form' => $form->createView(),
        ));
      }
    }

}
