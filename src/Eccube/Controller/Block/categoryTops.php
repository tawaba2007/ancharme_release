<?php

namespace Eccube\Controller\Block;


use Eccube\Application;
use Symfony\Component\HttpFoundation\Request;

class categoryTops
{
    public function index(Application $app, Request $request)
    {
        $Category = $app['eccube.repository.category']->find(1);

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
        return $app->render('Block/categoryTops.twig', array(
            'Products' => $Products,
        ));
    }
}
