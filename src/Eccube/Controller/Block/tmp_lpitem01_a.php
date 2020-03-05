<?php

namespace Eccube\Controller\Block;


use Eccube\Application;
use Symfony\Component\HttpFoundation\Request;

class tmp_lpitem01_a
{
    public function index(Application $app, Request $request)
    {
        $Category = $app['eccube.repository.category']->find(17);

        $Products = $app['eccube.repository.product']
            ->createQueryBuilder('p')
            //ここでカテゴリを抽出条件に追加する
            ->innerJoin('p.ProductCategories', 'pct')
            ->innerJoin('pct.Category', 'c')
            ->andWhere('pct.Category = :Category')
            ->setParameter('Category', $Category)
            ->andWhere('p.Status = 1')

            ->orderBy('p.create_date', 'DESC')
            ->setMaxResults(6)
            ->getQuery()
            ->getResult();
        return $app->render('Block/tmp_lpitem01_a.twig', array(
            'Products' => $Products,
        ));
    }
}
