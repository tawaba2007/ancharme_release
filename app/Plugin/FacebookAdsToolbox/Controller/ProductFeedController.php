<?php
/**
 * Copyright (c) 2016-present, Facebook, Inc.
 * All rights reserved.
 *
 * This source code is licensed under the BSD-style license found in the
 * LICENSE file in the root directory of this source tree. An additional grant
 * of patent rights can be found in the PATENTS file in the code directory.
 */

namespace Plugin\FacebookAdsToolbox\Controller;


use Eccube\Application;
use Eccube\Controller\AbstractController;
use Eccube\Entity\Master\CsvType;
use Eccube\Twig\Extension\EccubeExtension;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

use Plugin\FacebookAdsToolbox\Entity\FacebookAdsToolbox;

class ProductFeedController extends AbstractController {
  /**
   *
   * @param Application $app
   * @param Request $request
   * @return StreamedResponse
   */
  public function export(Application $app, Request $request) {
      set_time_limit(0);

      $em = $app['orm.em'];
      $em->getConfiguration()->setSQLLogger(null);

      $response = new StreamedResponse();
      $response->setCallback(function () use ($app, $request) {

        $app['eccube.service.csv.export']->initCsvType(
          CsvType::CSV_TYPE_PRODUCT);

        $app['eccube.service.csv.export']->setConfig(
          array(
            'csv_export_encoding' => 'UTF-8',
            'csv_export_separator' => "\t",
            'csv_export_multidata_separator' => ','
        ));

        $headers = array(
          'id',
          'item_group_id',
          'title',
          'description',
          'google_product_category',
          'link',
          'image_link',
          'additional_image_link',
          'condition',
          'availability',
          'price',
          'brand',
        );
        $app['eccube.service.csv.export']->fopen();
        $app['eccube.service.csv.export']->fputcsv($headers);
        $app['eccube.service.csv.export']->fclose();

        $qb = $app['eccube.service.csv.export']
            ->getProductQueryBuilder($request);

        $qb->resetDQLPart('select')
            ->resetDQLPart('orderBy')
            ->select('p')
            ->andWhere('p.Status = 1')
            ->orderBy('p.update_date', 'DESC')
            ->setMaxResults(20000)
            ->distinct();

        // URL generation extension
        $extention = new \Eccube\Twig\Extension\EccubeExtension($app);
        $query = $qb->getQuery();
        $em = $app['orm.em'];
        // populate base url for image.
        $site_root = $request->getSchemeAndHttpHost().
          $app['config']['image_save_urlpath'].'/';

        $app['eccube.service.csv.export']->fopen();
        foreach ($query->getResult() as $Product) {

          // change availability based on status.
          $availability = 'out of stock';
          if ($Product->getStockFind()) {
            $availability = 'in stock';
          }

          $description = str_replace(PHP_EOL, '', $Product->getDescriptionDetail());
          if (empty($description)) {
            $description = $Product->getName();
          }

          $additional_image_links = '';
          if (count($Product->getProductImage()) > 1) {
            $additional_image_link_list = array();
            foreach ($Product->getProductImage() as $idx => $image) {
              if ($idx < 10) {
                $additional_image_link_list[] = $site_root.$image;
              }
            }
            $additional_image_links = implode(',', $additional_image_link_list);
          }

          $row = array(
            $Product->getId(),
            $Product->getId(),
            substr(strip_tags($Product->getName()), 0, 100),
            // description in single line
            substr(strip_tags($description), 0, 1000),
            'EC-Cube', // category
            $extention->getUrl(
              'product_detail',
              array('id' => $Product->getId())), // link
            $site_root.$Product->getMainListImage(), // image_link
            substr($additional_image_links, 0, 2000), // additional_image_link
            'new', // Conditions
            $availability, // availability
            $Product->getPrice02IncTaxMin(), // price
            strip_tags($Product->getName()), // brand
          );
          $app['eccube.service.csv.export']->fputcsv($row);

          $em->detach($Product);
          $em->clear();
          $query->free();
          flush();
        }
        $app['eccube.service.csv.export']->fclose();
    });

    $response->send();

    return $response;
  }
}
