<?php
/*
 * GtmLite: Google Tag Manager コンテナタグ設置プラグイン
 * Copyright (C) 2017 Freischtide Inc. All Rights Reserved.
 * http://freischtide.tumblr.com/
 *
 * License: see LICENSE.txt
 */

namespace Plugin\GtmLite\Controller;

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
        $repo = $app['eccube.plugin.gtmlite.repository.gtmlite'];
        $config = Yaml::parse(__DIR__ . '/../config.yml');
        $gtmlite = $repo->findByCode($config['code']);

        $form = $app['form.factory']->createBuilder('gtmlite', $gtmlite)->getForm();

        if ($request->getMethod() === 'POST') {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $status = $repo->save($gtmlite);
                if ($status) {
                    $app->addSuccess('admin.gtmlite.save.complete', 'admin');
                    return $app->redirect($app->url('plugin_GtmLite_config'));
                } else {
                    $app->addError('admin.gtmlite.save.error', 'admin');
                }
            } else {
                $app->addError('admin.gtmlite.form.is_invalid', 'admin');
            }
        }

        return $app->render('GtmLite/Resource/template/admin/config.twig', array(
            'form' => $form->createView(),
            'gtmlite' => $gtmlite
        ));
    }
}
