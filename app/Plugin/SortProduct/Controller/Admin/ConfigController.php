<?php


namespace Plugin\SortProduct\Controller\Admin;

use Eccube\Application;
use Eccube\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Eccube\Controller\Admin\Content\FileController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;


use Eccube\Event\EccubeEvents;
use Eccube\Event\EventArgs;
use Plugin\SortProduct\Entity\SortProduct;
use Plugin\SortProduct\Util\CommonMethod;
use Plugin\SortProduct\Util\CommonMethodCategory;

class ConfigController
{

    // 並び替えをrankで制御する
    // rankは大きい数字ほど優先順位が高い
    public function index(Application $app, Request $request, $categoryId=null)
    {
        $Config = $app['plg.sort_product.repository.sort_product_config']->createQueryBuilder('nec')->addOrderBy('nec.update_date', 'DESC')->setMaxResults(1)->getQuery()->getOneOrNullResult();
        // 新規登録時
        if ($Config == null) {
            $Config = new \Plugin\SortProduct\Entity\SortProductConfig();
        }

        $builder = $app['form.factory']->createBuilder('plg_sort_product_config', $Config);
        $form = $builder->getForm();

        if ('POST' === $request->getMethod()) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $Config = $form->getData();
                $app['orm.em']->persist($Config);
                $app['orm.em']->flush();
            }
        }

        return $app->render('\SortProduct\Resource\template\admin\config.twig',
            array(
                'form'   => $form->createView(),
                'Config' => $Config,
            )
        );

    }



}
