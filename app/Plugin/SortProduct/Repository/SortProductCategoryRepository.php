<?php

namespace Plugin\SortProduct\Repository;

use Doctrine\ORM\EntityRepository;


class SortProductCategoryRepository extends EntityRepository
{
    /*
     * 全レコードをrankのDESC順にソートして返す
     * $result = array(
     *            0 => array( "product_id" => "146", "rank"=>"500"),
     *            1 => array( "product_id" => "287", "rank"=>"300"),
     *            2 => array( "product_id" => "133", "rank"=>"100"),
     *         )
     */
    public function getAllRecordOrderByRank()
    {
        $qb = $this->createQueryBuilder('sp')
            ->orderBy('sp.rank', 'DESC');

        $qb->select('sp.product_id');
        $qb->addSelect('sp.rank');


        $result = $qb->getQuery()->getResult();

        return $result;
    }
    /*
     * 全レコードをrankのDESC順にソートして返す
     *
     * @Return entityの配列
     */
    public function getAllRecordOrderByRankDESC($Category)
    {
        $qb = $this->createQueryBuilder('spc')
            ->orderBy('spc.rank', 'DESC');

        $qb
            ->andWhere('spc.category_id = :categoryId')
            ->setParameter('categoryId', $Category->getId());

        $entityArray = $qb->getQuery()->getResult();

        return $entityArray;
    }
    /*
     * 全レコードをrankのASC順にソートして返す
     *
     * @Return entityの配列
     */
    public function getAllRecordOrderByRankASC($Category)
    {
        $qb = $this->createQueryBuilder('spc')
            ->orderBy('spc.rank', 'ASC');

        $qb
            ->andWhere('spc.category_id = :categoryId')
            ->setParameter('categoryId', $Category->getId());

        $entityArray = $qb->getQuery()->getResult();

        return $entityArray;
    }
    /*
     * 引数で渡された商品ID一覧に該当するレコードをrankのDESC順にソートして返す
     * $result = array(
     *            0 => array( "product_id" => "146", "rank"=>"500"),
     *            1 => array( "product_id" => "287", "rank"=>"300"),
     *            2 => array( "product_id" => "133", "rank"=>"100"),
     *         )
     */
    public function getRecordOrderByRank($Category, $productIds)
    {
        $qb = $this->createQueryBuilder('spc');

        $qb->where($qb->expr()->in('spc.product_id', $productIds));

        $qb->orderBy('spc.rank', 'DESC');

        $qb->select('spc.product_id');
        $qb->addSelect('spc.rank');

        $qb
            ->andWhere('spc.category_id = :categoryId')
            ->setParameter('categoryId', $Category->getId());

        $result = $qb->getQuery()->getResult();

        return $result;
    }
    /*
     * 引数で渡された商品ID一覧をrankのDESC順にソートして返す
     * $result = array(
     *            0 => array( "product_id" => "146"),
     *            1 => array( "product_id" => "287"),
     *            2 => array( "product_id" => "133"),
     *         )
     */
//    public function getProductIdOrderByRank0($Category, $productIds)
//    {
//        if ($Category == null || $Category->getId() === null) {
//            return array();
//        }
//
//        $qb = $this->createQueryBuilder('spc');
//
//        $qb->where($qb->expr()->in('spc.product_id', $productIds));
//
//        $qb
//            ->andWhere('spc.category_id = :categoryId')
//            ->setParameter('categoryId', $Category->getId());
//
//        $qb->orderBy('spc.rank', 'DESC');
//
//        $qb->select('spc.product_id');
//
//        $result = $qb->getQuery()->getResult();
//
//        return $result;
//    }
//    public function getProductIdOrderByRank2($qb2, $Category)
//    {
//        if ($qb == null || $Category == null || $Category->getId() === null) {
//            return array();
//        }
//
//        $qb = $this->createQueryBuilder('spc');
//
//        $qb->where($qb->expr()->in('spc.product_id', $productIds));
//
//        $qb
//            ->andWhere('spc.category_id = :categoryId')
//            ->setParameter('categoryId', $Category->getId());
//
//        $qb->orderBy('spc.rank', 'DESC');
//
//        $qb->select('spc.product_id');
//
//        $result = $qb->getQuery()->getResult();
//
//        return $result;
//    }

    public function getProductIdOrderByRank($Category, $productIds)
    {
        if ($Category == null || $Category->getId() === null) {
            return array();
        }
        $categoryId = $Category->getId();

        $qb = $this->createQueryBuilder('spc');
        $qb->leftJoin('spc.Product', 'p');

        $qb->where($qb->expr()->in('p.id', $productIds));

        $qb
            ->andWhere('spc.category_id = :categoryId')
            ->setParameter('categoryId', $categoryId);

        $qb->orderBy('spc.rank', 'DESC');

        $qb->select('p.id as product_id');

        $result = $qb->getQuery()->getResult();

        return $result;
    }

    // sqlでためしてボツ
//    public function getProductOrderByRank($Category, $productIds)
//    {
//        if ($Category == null || $Category->getId() === null) {
//            return array();
//        }
//        $categoryId = $Category->getId();
//
//
//        $app = \Eccube\Application::getInstance();  // $app取得
//
//
//        $sql = 'SELECT p.*
//                FROM plg_sort_product_category spc
//                INNER JOIN dtb_product p ON spc.product_id = p.product_id
//                WHERE spc.category_id = :categoryId';
//        $sql .= ' AND spc.product_id IN(' . implode(',', $productIds) . ')';
//        $sql .= ' ORDER BY spc.rank DESC';
//        $sql .= ';';
//
//        $params = array(
//            'categoryId' => $categoryId,
//        );
//
//        $result = $app['orm.em']->getConnection()->fetchAll($sql,$params);
//
//        return $result;
//    }

    public function getQbSortProductCategoryByRankDESC($Category)
    {
        if ($Category == null || $Category->getId() === null) {
            return array();
        }
        $categoryId = $Category->getId();

        $qb = $this->createQueryBuilder('spc');

//        $qb->select('p.id as product_id')->innerJoin('spc.Product', 'p');

        $qb->andWhere('spc.category_id = :categoryId')->setParameter('categoryId', $Category->getId());

        $qb->orderBy('spc.rank', 'DESC');

        return $qb;
    }

    public function getProductByCategoryOrderByRank($categoryId)
    {
        $qb = $this->createQueryBuilder('spc');

        $qb
            ->where('spc.category_id = :categoryId')
            ->setParameter('categoryId', $categoryId);

        $qb->orderBy('spc.rank', 'DESC');

        $result = $qb->getQuery()->getResult();

        return $result;
    }

    public function getQbByCategoryOrderByRank($categoryId)
    {
        $qb = $this->createQueryBuilder('spc');

        $qb
            ->where('spc.category_id = :categoryId')
            ->setParameter('categoryId', $categoryId);

        $qb->orderBy('spc.rank', 'DESC');

        return $qb;
    }

    /*
     * 引数で渡された商品ID一覧のrank一覧をDESC順で返す
     * $result = array(
     *            0 => array( "rank" => "100"),
     *            1 => array( "rank" => "50"),
     *            2 => array( "rank" => "2"),
     *         )
     */
    public function getProductRankOrderByRank0($Category, $productIds)
    {
        $qb = $this->createQueryBuilder('spc');

        $qb->where($qb->expr()->in('spc.product_id', $productIds));

        $qb->orderBy('spc.rank', 'DESC');

        $qb->select('spc.rank');

        $qb
            ->where('spc.category_id = :categoryId')
            ->setParameter('categoryId', $Category->getId());

        $result = $qb->getQuery()->getResult();

        return $result;
    }

    public function getProductRankByRankDESC($Category)
    {
        $qb = $this->createQueryBuilder('spc');

        $qb->select('spc.rank');

        $qb
            ->where('spc.category_id = :categoryId')
            ->setParameter('categoryId', $Category->getId());

        $qb->orderBy('spc.rank', 'DESC');

        $result = $qb->getQuery()->getResult();

        return $result;
    }

    // 現在設定されている最大のrankを返す
    public function getMaxRank($Category)
    {
        $qb = $this->createQueryBuilder('spc');
        $qb->select('MAX(spc.rank) as max_rank');

        $qb
            ->andWhere('spc.category_id = :categoryId')
            ->setParameter('categoryId', $Category->getId());

        $result = $qb->getQuery()->getResult();

        return $result[0]['max_rank'];  // <-結果が1個しかないので
    }

    // SortProductテーブルでrankが設定されていないレコード(rank==null)を探す
    public function getNoRankRecords()
    {
        $noRankRecords = $this->createQueryBuilder('sp')
            ->where('sp.rank is NULL')
            ->getQuery()->getResult();

        return $noRankRecords;
    }

}
