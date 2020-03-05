<?php
/*
 * UaGaEEc: Google Analytics eコマース/拡張eコマース対応プラグイン
 * Copyright (C) 2016-2017 Freischtide Inc. All Rights Reserved.
 * http://freischtide.tumblr.com/
 *
 * License: see LICENSE.txt
 */

namespace Plugin\UaGaEEc\Controller;

use Eccube\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Yaml\Yaml;

/**
 * Controller to handle module setting screen
 */
class ConfigController
{
    /**
     * Edit config
     *
     * @param Application $app
     * @param Request $request
     * @return type
     */
    public function edit(Application $app, Request $request)
    {
        $repo = $app['eccube.plugin.uagaeec.repository.uagaeec'];
        $config = Yaml::parse(__DIR__ . '/../config.yml');
        $uaGaEEc = $repo->findByCode($config['code']);

        $form = $app['form.factory']->createBuilder('uagaeec', $uaGaEEc)->getForm();

        if ($request->getMethod() === 'POST') {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $status = $repo->save($uaGaEEc, $_POST['custom_referrer_key'], $_POST['custom_referrer_value']);
                if ($status) {
                    $app->addSuccess('admin.uagaeec.save.complete', 'admin');
                    return $app->redirect($app->url('plugin_UaGaEEc_config'));
                } else {
                    $app->addError('admin.uagaeec.save.error', 'admin');
                }
            } else {
                $app->addError('admin.uagaeec.form.is_invalid', 'admin');
            }
        }

        return $app->render('UaGaEEc/Resource/template/admin/config.twig', array(
            'form' => $form->createView(),
            'uagaeec' => $uaGaEEc
        ));
    }
}
