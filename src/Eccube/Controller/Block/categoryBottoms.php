<?php

namespace Eccube\Controller\Block;


use Eccube\Application;
use Symfony\Component\HttpFoundation\Request;

class categoryBottoms
{
    public function index(Application $app, Request $request)
    {
        $Category = $app['eccube.repository.category']->find(6);

        $Products = $app['eccube.repository.product']
            ->createQueryBuilder('p')
            //ここでカテゴリを抽出条件に追加する
            ->innerJoin('p.ProductCategories', 'pct')
            ->innerJoin('pct.Category', 'c')
            ->andWhere('pct.Category = :Category')
            ->setParameter('Category', $Category)
            ->andWhere('p.Status = 1')

            ->orderBy('p.create_date', 'DESC')
            ->setMaxResults(null)
            ->getQuery()
            ->getResult();
        return $app->render('Block/categoryBottoms.twig', array(
            'Products' => $Products,
        ));
    }
}
