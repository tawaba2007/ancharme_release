<?php
/**
 * This file is part of the ProductReview plugin.
 *
 * Copyright (C) 2016 LOCKON CO.,LTD. All Rights Reserved.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\ProductReview\Repository;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Eccube\Common\Constant;
use Eccube\Entity\AbstractEntity;
use Eccube\Entity\Master\Disp;
use Eccube\Entity\Master\Sex;
use Eccube\Entity\Product;
use Plugin\ProductReview\Entity\ProductReview;

/**
 * ProductReview.
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProductReviewRepository extends EntityRepository
{
    /**
     * Save method.
     *
     * @param ProductReview $ProductReview
     *
     * @return bool
     */
    public function save(ProductReview $ProductReview)
    {
        try {
            $this->_em->persist($ProductReview);
            $this->_em->flush($ProductReview);
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }

    /**
     * Delete method.
     *
     * @param ProductReview $ProductReview
     *
     * @return bool
     */
    public function delete(ProductReview $ProductReview)
    {
        try {
            $ProductReview->setDelFlg(Constant::ENABLED);
            $this->_em->persist($ProductReview);
            $this->_em->flush($ProductReview);
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }

    /**
     * 検索条件での検索を行う。
     *
     * @param array $searchData
     *
     * @return QueryBuilder
     */
    public function getQueryBuilderBySearchData($searchData)
    {
        $qb = $this->createQueryBuilder('r')
            ->select('r')
            ->innerJoin('r.Product', 'p')
            ->andWhere('r.del_flg = :del');
        $qb->setParameter('del', Constant::DISABLED);

        // Do not allow search zero (number 0).
        if (!empty($searchData['multi'])) {
            $qb
                ->andWhere('r.reviewer_name LIKE :reviewer_name OR r.reviewer_url LIKE :reviewer_url')
                ->setParameter('reviewer_name', '%'.$searchData['multi'].'%')
                ->setParameter('reviewer_url', '%'.$searchData['multi'].'%');
        }

        // 商品名
        // Allow search zero.
        if (isset($searchData['product_name']) && !is_null($searchData['product_name'])) {
            $qb
                ->andWhere('p.name LIKE :product_name')
                ->setParameter('product_name', '%'.$searchData['product_name'].'%');
        }

        // 商品コード
        // Allow search zero.
        if (isset($searchData['product_code']) && !is_null($searchData['product_code'])) {
            $qb
                ->innerJoin('p.ProductClasses', 'pc')
                ->andWhere('pc.code LIKE :code')
                ->setParameter('code', '%'.$searchData['product_code'].'%');
        }

        // 性別
        if (!empty($searchData['sex']) && count($searchData['sex']) > 0) {
            $arrSexId = array();
            $arrSex = $searchData['sex'];
            foreach ($arrSex as $sex) {
                if ($sex instanceof Sex) {
                    $arrSexId[] = $sex->getId();
                } elseif (is_numeric($sex)) {
                    $arrSexId[] = $sex;
                }
            }
            $qb
                ->andWhere($qb->expr()->in('r.Sex', ':arrSexId'))
                ->setParameter('arrSexId', $arrSexId);
        }

        // おすすめレベル
        if (isset($searchData['recommend_level']) && !is_null($searchData['recommend_level'])) {
            $qb
                ->andWhere($qb->expr()->in('r.recommend_level', ':recommend_level'))
                ->setParameter('recommend_level', $searchData['recommend_level']);
        }

        // 投稿日
        if (isset($searchData['review_start']) && !is_null($searchData['review_start'])) {
            $date = $searchData['review_start']
                ->format('Y-m-d H:i:s');
            $qb
                ->andWhere('r.create_date >= :review_start')
                ->setParameter('review_start', $date);
        }
        if (isset($searchData['review_end']) && !is_null($searchData['review_end'])) {
            $date = $searchData['review_end']
                ->modify('+1 days')
                ->format('Y-m-d H:i:s');
            $qb
                ->andWhere('r.create_date < :review_end')
                ->setParameter('review_end', $date);
        }
        // status
        if (!empty($searchData['status']) && count($searchData['status']) > 0) {
            $arrId = array();
            $arrStatus = $searchData['status'];
            foreach ($arrStatus as $status) {
                if ($status instanceof Disp) {
                    $arrId[] = $status->getId();
                } elseif (is_numeric($status)) {
                    $arrId[] = $status;
                }
            }
            $qb
                ->andWhere($qb->expr()->in('r.Status', ':arrId'))
                ->setParameter('arrId', $arrId);
        }

        // Order By
        $qb->addOrderBy('r.update_date', 'DESC');

        return $qb;
    }

    /**
     * Find entity.
     *
     * @param array $searchData セッションから取得した検索条件の配列
     */
    public function findDeserializeObjects(array &$searchData)
    {
        $em = $this->_em;
        foreach ($searchData as &$conditions) {
            if ($conditions instanceof ArrayCollection) {
                $conditions = new ArrayCollection(
                    array_map(
                        function (AbstractEntity $entity) use ($em) {
                            return $em->getRepository(get_class($entity))->find($entity->getId());
                        },
                        $conditions->toArray()
                    )
                );
            } elseif ($conditions instanceof AbstractEntity) {
                $conditions = $em->getRepository(get_class($conditions))->find($conditions->getId());
            }
        }
    }

    /**
     * Get Avg and count.
     *
     * @param Product $Product
     * @param Disp    $Disp
     *
     * @return mixed
     */
    public function getAvgAll(Product $Product, Disp $Disp)
    {
        $arrTemp = array(
            'recommend_avg' => 0,
            'review_num' => 0,
        );
        try {
            $qb = $this->createQueryBuilder('r')
                ->select('avg(r.recommend_level) as recommend_avg, count(r.id) as review_num')
                ->leftJoin('r.Product', 'p')
                ->where('r.Product = :Product')
                ->setParameter('Product', $Product)
                ->andWhere('r.Status = :Status')
                ->setParameter('Status', $Disp)
                ->andWhere('r.del_flg = :del')
                ->setParameter('del', Constant::DISABLED)
                ->groupBy('r.Product');

            return $qb->getQuery()->getSingleResult();
        } catch (\Exception $exception) {
            return $arrTemp;
        }
    }
}