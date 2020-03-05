<?php
/*
* This file is part of the BreadcrumbList3-plugin package.
*
* (c) Nobuhiko Kimoto All Rights Reserved.
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
 */

namespace Plugin\BreadcrumbList3\Controller\Block;

use Eccube\Application;
use Symfony\Component\DomCrawler\Crawler;
use Eccube\Entity\PageLayout;

class BreadcrumbList3Controller
{
    /**
     * @param Application $app
     */
    public function index(Application $app)
    {
        // 初期化
        $Breadcrumb[0][0] = array();
        $arrBreadcrumb = array();

        // routeを取得
        $route = $app['request']->get('_route');

        $DeviceType = $app['eccube.repository.master.device_type']
            ->find(\Eccube\Entity\Master\DeviceType::DEVICE_TYPE_PC);

        if ($route == $app['config']['user_data_route']) {
            $params = $app['request']->attributes->get('_route_params');
            $route = $params['route'];
        }

        $PageLayout = $app['eccube.repository.page_layout']->getByUrl($DeviceType, $route);

        switch ($route) {
        case 'product_list':

            $id = $app['request']->query->get('category_id');

            if ($id) {
                $builder = $app['form.factory']->createNamedBuilder('', 'search_product');
                $builder->setMethod('GET');
                $searchForm = $builder->getForm();
                $searchForm->handleRequest($app['request']);
                $searchData = $searchForm->getData();

                $Category = $searchForm->get('category_id')->getData();

                $arrBreadcrumb[0]['category_name'] = $PageLayout->getName();
                $arrBreadcrumb[0]['url'] = 'product_list';
                $arrBreadcrumb[0]['q'] = '';

                $key = 1;

                foreach($Category->getPath() as $cat) {

                    if ((count($Category->getPath())) == $key) {

                        $PageLayout->setName($cat->getName());

                    } else {

                        $arrBreadcrumb[$key]['category_name'] = $cat->getName();
                        $arrBreadcrumb[$key]['url'] = 'product_list';
                        $arrBreadcrumb[$key]['q'] = '?category_id='.$cat->getId();
                    }
                    $key++;
                }
                $Breadcrumb[0] = $arrBreadcrumb;
            }

            break;
        case 'product_detail':
            $Breadcrumb = array();

            $id = $app['request']->attributes->get('id');
            $Product = $app['eccube.repository.product']->get($id);


            foreach($Product->getProductCategories() as $ProductCategories) {

                // 同一ルートのカテゴリーは1つにまとめる
                $id = $ProductCategories->getCategory()->getId();
                $parents = $ProductCategories->getCategory()->getParents();
                if (!empty($parents)) {
                    $id = $parents[0]->getId();
                }

                $key = 1;
                $arrBreadcrumb = array();
                $arrBreadcrumb[0]['category_name'] = '商品一覧ページ';
                $arrBreadcrumb[0]['url'] = 'product_list';
                $arrBreadcrumb[0]['q'] = '';

                foreach($ProductCategories->getCategory()->getPath() as $cat) {
                    $arrBreadcrumb[$key]['category_name'] = $cat->getName();
                    $arrBreadcrumb[$key]['url'] = 'product_list';
                    $arrBreadcrumb[$key]['q'] = '?category_id='.$cat->getId();
                    $key++;
                }
                $Breadcrumb[$id] = $arrBreadcrumb;
            }
            $PageLayout->setName($Product->getName());

            break;
        case 'homepage':
            // TOPは表示しない
            $PageLayout = '';
            break;
        default:
            // todo twigからtitleを自動取得したいが無理そう
            if (strpos($PageLayout->getUrl(), 'mypage') !== false) {
                $arrBreadcrumb[0]['category_name'] = 'Myページ';
                $arrBreadcrumb[0]['url'] = 'mypage';
                $arrBreadcrumb[0]['q'] = '';
                $Breadcrumb[0] = $arrBreadcrumb;
                $PageLayout->setName(ltrim(strstr($PageLayout->getName(), '/'), '/'));

            } elseif (strpos($PageLayout->getUrl(), 'shopping') !== false) {
                $PageLayout->setName('ショッピングカート');
            }
            break;
        }

        return $app['view']->render('Block/breadcrumbList_block.twig', array(
            'PageLayout' => $PageLayout,
            'BreadcrumbList' => $Breadcrumb,
        ));
    }
}
