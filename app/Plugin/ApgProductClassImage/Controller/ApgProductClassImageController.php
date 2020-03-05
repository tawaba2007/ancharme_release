<?php

/*
 * This file is part of the ApgProductClassImage
 *
 * Copyright (C) 2018 ARCHIPELAGO Inc.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\ApgProductClassImage\Controller;

use Eccube\Application;
use Plugin\ApgProductClassImage\Util\Paths;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnsupportedMediaTypeHttpException;

/**
 * 管理画面用のコントローラー
 * Class ApgProductClassImageController
 * @package Plugin\ApgProductClassImage\Controller
 */
class ApgProductClassImageController
{

    /**
     * ApgProductClassImageの設定画面用
     *
     * @param Application $app
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Application $app, Request $request)
    {

        throw  new NotFoundHttpException();
        // add code...

//        return $app->render('ApgProductClassImage/Resource/template/index.twig', array(// add parameter...
//        ));
    }


    /**
     * 商品規格画像の一時保存用(Ajaxのみ)
     * @param Application $app
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function addImage(Application $app, Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            throw new BadRequestHttpException('[商品規格画像]リクエストが不正です');
        }
        $productId = $request->request->get('id');
        $image = $request->files->get('image_file');
        if (!empty($image)) {
            $mimeType = $image->getMimeType();
            if (0 !== strpos($mimeType, 'image')) {
                throw new UnsupportedMediaTypeHttpException('[商品規格画像]ファイル形式が不正です');
            }
            $baseFilePath = Paths::productClassImageBasePath();
            $filePath = Paths::productImagesRealPath($productId, true);
            $extension = $image->getClientOriginalExtension();
            $fileName = date('mdHis') . uniqid('_') . '.' . $extension;
            $image->move($baseFilePath . $filePath, $fileName);

            $fileUrl = Paths::productClassImagesUrl($productId, $fileName, true);
        } else {
            $fileName = '';
            $fileUrl = '';
        }

        return $app->json(array(
            'id' => $productId,
            'file' => $fileName,
            'image_url' => $fileUrl
        ), 200);
    }

}
