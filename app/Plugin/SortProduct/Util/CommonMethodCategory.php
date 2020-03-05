<?php


namespace Plugin\SortProduct\Util;

use \Plugin\SortProduct\Entity\SortProduct;
use Eccube\Application;
//use Symfony\Component\HttpFoundation\Request;
//use Eccube\Common\Constant;
//use Eccube\Exception\CartException;

/**
 * 複数クラスで統一したロジックで動かないといけないメソッドをここに集約する
 *
 * use Plugin\SortProduct\Util\CommonMethod;
 * CommonMethod::
 */
class CommonMethodCategory
{
    // 並び替え番号の現在の最大値を求める
    public static function getMaxRank($Category)
    {
        $app = Application::getInstance();  // $app取得

        $maxRank = $app['orm.em']->getRepository('Plugin\SortProduct\Entity\SortProductCategory')->getMaxRank($Category);

        return $maxRank;
    }


    // 1. Productテーブルにある商品で、SortProductテーブルに設定されていないレコードを探して、SortProductテーブルにrankを登録する
    // 2. SortProductテーブルでrankが設定されていないレコードを探して、rankを設定する
    // 並び替え番号がnullの場合は、商品番号順に最大値+1から順に番号をふる
    public static function setNewRank($Category)
    {
        if ($Category == null) {
            return false;
        }

        $app = Application::getInstance();  // $app取得

        // 1. Productテーブルにある商品で、SortProductテーブルに設定されていないレコードを探して、SortProductテーブルにrankを登録する
        //   Productの全レコードの商品IDを取得
//        $qb = $app['orm.em']->createQueryBuilder()
//            ->from('Eccube\Entity\Product', "p");
//        $Categories = array($Category);
//        $Categories = $Category->getSelfAndDescendants();
//        $productIds = $qb
//            ->select("p.id")
//            ->innerJoin('p.ProductCategories', 'pct')
//            ->innerJoin('pct.Category', 'c')
//            ->andWhere($qb->expr()->in('pct.Category', ':Categories'))
//            ->setParameter('Categories', $Categories)
//            ->getQuery()->getResult();

        // 高速化のためAtomを使用する
//        $productIdAtomArray = self::getProductIdAtomArray($Category);
//        //   全商品を対象に、rank値が設定されていない商品を探し、なければ設定する
//        foreach($productIdAtomArray as $productIdAtom) {
//            self::hashProductIdToRank($Category, $productIdAtom["id"]);  // rank値が設定されていない商品を探し、なければ設定する(メソッドの戻値は、この後 使用しないので保管しない)
//        }
////        dump($app['plg.sort_product.repository.sort_product_category']->findAll());
        $ProductAtomArray = self::getProductAtomArray($Category);
        //   全商品を対象に、rank値が設定されていない商品を探し、なければ設定する
        foreach($ProductAtomArray as $Product) {
            self::hashProductToRank($Category, $Product);  // rank値が設定されていない商品を探し、なければ設定する(メソッドの戻値は、この後 使用しないので保管しない)
        }
//        dump($app['plg.sort_product.repository.sort_product_category']->findAll());

        // 2. SortProductテーブルでrankが設定されていないレコードを探して、rankを設定する
        //   SortProductテーブルでrankが設定されていないレコード(rank==null)を探す
//        $noRankRecords = $app['orm.em']->getRepository('Plugin\SortProduct\Entity\SortProductCategory')->getNoRankRecords();
        $noRankRecords = $app['plg.sort_product.repository.sort_product_category']->getNoRankRecords();
        $newRank = self::getMaxRank($Category) + 1;  // ランクがない物は、最大値+1から振る
        //   rankがnullのレコードへ、新規rank値を登録
//        foreach($noRankRecords as $noRankRecord){
//            if($noRankRecord->getRank()==null){  // ねんのため再確認
//                //並び替え番号がnullの場合は、商品番号順に最大値+1から順に番号をふる
//                $noRankRecord->setRank($newRank++);
//                $app['orm.em']->persist($noRankRecord);
//            }
//        }
        //   新規rankは商品コードを割り当てる
        foreach($noRankRecords as $noRankRecord){
            if($noRankRecord->getRank()==null){  // ねんのため再確認
                //並び替え番号がnullの場合は、商品番号順に最大値+1から順に番号をふる
//                $newRank = $noRankRecord->getProduct_id();
                $noRankRecord->setRank($newRank++);
                $app['orm.em']->persist($noRankRecord);
            }
        }
        $app['orm.em']->flush();

        return true;
    }

    // [product_id]を入力し、rankを返すハッシュ
    // もし、指定した商品($productId)のRANK情報がなければ、新規登録する
    public static function hashProductIdToRank($Category, $productId)
    {
        $app = Application::getInstance();  // $app取得

        if ($Category === null) {
            return false;
        }

//        $sortProductRecord = $app['orm.em']->getRepository('\Plugin\SortProduct\Entity\SortProductCategory')
        $sortProductRecord = $app['plg.sort_product.repository.sort_product_category']
            ->findOneBy(array('category_id'=>$Category->getId(), 'product_id'=>$productId));

//        dump($sortProductRecord);


        // もし、RANKデータがなければ、新規登録する
//        if($sortProductRecord===null){
//            $new_entity_SortProduct = new SortProduct();
//            $new_entity_SortProduct->setProduct_id($productId);
//            $newRank = self::getMaxRank() + 1;  // 新しいrankは、現在のrankの最大値+1を割り当てる
//            $new_entity_SortProduct->setRank($newRank);
//            $app['orm.em']->persist($new_entity_SortProduct);
//            $app['orm.em']->flush();
//            $sortProductRecord = $new_entity_SortProduct;
//        }
        if ($sortProductRecord == null){
            $SortProductCategory = new \Plugin\SortProduct\Entity\SortProductCategory();
            $SortProductCategory->setCategoryId($Category->getId());
            $SortProductCategory->setProductId($productId);
            $newRank = self::getMaxRank($Category) + 1;  // 新しいrankは、現在のrankの最大値+1を割り当てる
            $SortProductCategory->setRank($newRank);
            $app['orm.em']->persist($SortProductCategory);
            $app['orm.em']->flush();
            $sortProductRecord = $SortProductCategory;
        }
        // 新rankにはproductIdを割り当てる
        // 再復活に耐えられないため却下
//        if ($sortProductRecord == null){
//            $SortProductCategory = new \Plugin\SortProduct\Entity\SortProductCategory();
//            $SortProductCategory->setCategoryId($Category->getId());
//
//            $SortProductCategory->setProductId($productId);
//            $newRank = $productId;  // 再復活に耐えられないため却下
//            $SortProductCategory->setRank($newRank);
//            $app['orm.em']->persist($SortProductCategory);
//            $app['orm.em']->flush();
//            $sortProductRecord = $SortProductCategory;
//        }

        return $sortProductRecord->getRank();
    }

    public static function hashProductToRank($Category, $Product)
    {
        $app = Application::getInstance();  // $app取得

        if ($Category == null || $Category->getId() === null) {
            return false;
        }
        $categoryId = $Category->getId();

        if ($Product == null || $Product->getId() === null) {
            return false;
        }
        $productId = $Product->getId();

        $sortProductRecord = $app['plg.sort_product.repository.sort_product_category']
            ->findOneBy(array('category_id'=>$Category->getId(), 'Product'=>$Product));

        // もし、RANKデータがなければ、新規登録する
        if ($sortProductRecord == null){
            $SortProductCategory = new \Plugin\SortProduct\Entity\SortProductCategory();
            $SortProductCategory->setCategoryId($categoryId);
            $SortProductCategory->setProduct($Product);
            $newRank = self::getMaxRank($Category) + 1;  // 新しいrankは、現在のrankの最大値+1を割り当てる
            $SortProductCategory->setRank($newRank);
            $app['orm.em']->persist($SortProductCategory);
            $app['orm.em']->flush();
            $sortProductRecord = $SortProductCategory;
        }

        return $sortProductRecord->getRank();
    }

    // 商品IDの重複を排除する
    public static function renewProductId($Category)
    {
        $app = Application::getInstance();  // $app取得

        // 1. 現在のrank順(DESC)で全レコードを取得
        $SortProductArray = $app['plg.sort_product.repository.sort_product_category']->getAllRecordOrderByRankDESC($Category);

        // 2. 重複したレコードはremoveする
        $isRedundancy = array();  // 商品コードの重複排除チェック $productsへ格納済みの商品はtrueで記録する
        foreach ($SortProductArray as $SortProduct) {
            if (isset($isRedundancy[$SortProduct->getProduct()->getId()]) && $isRedundancy[$SortProduct->getProduct()->getId()] == true) {
                $app['orm.em']->remove($SortProduct);
            } else {
                $isRedundancy[$SortProduct->getProduct()->getId()] = true;
            }
        }
        $app['orm.em']->flush();
    }

    // rankが重複しているものをなくすため、rankを振り直す
    public static function renewRank($Category)
    {
        $app = Application::getInstance();  // $app取得

        // 1. 現在のrank順(ASC)で全レコードを取得
        $SortProductArray = $app['plg.sort_product.repository.sort_product_category']->getAllRecordOrderByRankASC($Category);

        // 2. 1から順に振り直す
        $rank = 1;
        foreach($SortProductArray as $SortProduct){
//            $id=$SortProduct->getId();
//            $targetSortProduct = $repoSortProduct->findOneBy(array('id'=>$id));
//            $targetSortProduct->setRank($rank++);
//            $app['orm.em']->persist(targetSortProduct);
            $SortProduct->setRank($rank++);
            $app['orm.em']->persist($SortProduct);
        }
        $app['orm.em']->flush();
    }

    // カテゴリから外された商品のランクを削除する
    public static function deleteRank($Category)
    {
        if ($Category == null || $Category->getId() === null) {
            return false;
        }
        $categoryId = $Category->getId();

        $app = Application::getInstance();  // $app取得

        // SortProductCategoryとProductCategoryのレコード数が異なる場合に調整する
        $result = $app['plg.sort_product.repository.sort_product_category']
            ->createQueryBuilder('spc')
//            ->select('count(spc.product_id) as c')
            ->select('count(spc) as c')
            ->andWhere('spc.category_id = :categoryId')
            ->setParameter('categoryId', $categoryId)
            ->getQuery()->getSingleResult();
        $countSortProductCategory = (isset($result['c'])) ? $result['c'] : null;
//        dump($countSortProductCategory);

        $result = $app['orm.em']->getRepository('\Eccube\Entity\ProductCategory')
            ->createQueryBuilder('pc')
            ->select('count(pc.product_id) as c')
            ->andWhere('pc.category_id = :categoryId')
            ->setParameter('categoryId', $categoryId)
            ->getQuery()->getSingleResult();
        $countProductCategory = (isset($result['c'])) ? $result['c'] : null;
//        dump($countProductCategory);

        // SortProductCategoryとProductCategoryのレコード数が異なる場合に調整する
//        if ($countSortProductCategory != $countProductCategory) {
//
//            $categoryId = $Category->getId();
//            $SortProductCollection = $app['plg.sort_product.repository.sort_product_category']->findBy(array('category_id' => $categoryId));
//
//            foreach ($SortProductCollection as $SortProduct) {
//                $productId = $SortProduct->getProductId();
//                $ProductCategory = $app['orm.em']->getRepository('\Eccube\Entity\ProductCategory')->findOneBy(array('category_id' => $categoryId, 'product_id' => $productId));
//                if ($ProductCategory == null) {
//                    // カテゴリから外された商品のランクを削除する
//                    $app['orm.em']->remove($SortProduct);
//                }
//            }
//            $app['orm.em']->flush();
//        }
        if ($countSortProductCategory != $countProductCategory) {

            $SortProductCollection = $app['plg.sort_product.repository.sort_product_category']->findBy(array('category_id' => $categoryId));

            $productIdArray = self::getProductIdArray($Category);

            foreach ($SortProductCollection as $SortProduct) {
                if (!in_array($SortProduct->getProduct()->getId(), $productIdArray)) {
                    // カテゴリから外された商品のランクを削除する
                    $app['orm.em']->remove($SortProduct);
                }
            }
            $app['orm.em']->flush();
        }

        return true;
    }

    // カテゴリーの自身と子孫カテゴリーに諸族するProductId一覧を返す
    /*
     * 戻り値
     array:2 [▼
          0 => 2
          2 => 1
        ]
       添字1はユニークソートの結果 消えている
     */
    public static function getProductIdArray($Category)
    {
        $productIdAtomArray = self::getProductIdAtomArray($Category);

        // データの整形
        $productIdArray = array();
        foreach ($productIdAtomArray as $productIdAtom) {
            $productIdArray[] = $productIdAtom['id'];
        }
        $productIdArray = array_unique($productIdArray);  // 複数のカテゴリーに所属する商品があるため重複排除

        return $productIdArray;
    }
    // カテゴリーの自身と子孫カテゴリーに諸族するProductId一覧を返す
    /*
     * [!!! 注意 重複データ存在するので使用側で注意する !!!!]
     */
    /*
     * 戻り値
     array:3 [▼
          0 => array:1 [▼
            "id" => 2
          ]
          1 => array:1 [▼
            "id" => 2
          ]
          2 => array:1 [▼
            "id" => 1
          ]
        ]
     */
    private static function getProductIdAtomArray($Category)
    {
        $app = Application::getInstance();  // $app取得

        if ($Category == null) {
            // トップカテゴリーの場合
            $productIdArray = $app['orm.em']->createQueryBuilder()
                ->select("p.id")
                ->from('Eccube\Entity\Product', "p")
                ->getQuery()->getResult();

            return $productIdArray;

        } else {
            // カテゴリー指定がある場合
            $qb = $app['orm.em']->createQueryBuilder()
                ->from('Eccube\Entity\Product', "p");

//            $Categories = array($Category);
            $Categories = $Category->getSelfAndDescendants();

            $productIdArray = $qb
                ->select("p.id")
                ->innerJoin('p.ProductCategories', 'pct')
                ->innerJoin('pct.Category', 'c')
                ->andWhere($qb->expr()->in('pct.Category', ':Categories'))
                ->setParameter('Categories', $Categories)
                ->getQuery()->getResult();

            return $productIdArray;
        }
    }

    private static function getProductAtomArray($Category)
    {
        $app = Application::getInstance();  // $app取得

        if ($Category == null) {
            // トップカテゴリーの場合
            $productIdArray = $app['orm.em']->createQueryBuilder()
                ->select("p")
                ->from('Eccube\Entity\Product', "p")
                ->getQuery()->getResult();

            return $productIdArray;

        } else {
            // カテゴリー指定がある場合
            $qb = $app['orm.em']->createQueryBuilder()
                ->from('Eccube\Entity\Product', "p");

//            $Categories = array($Category);
            $Categories = $Category->getSelfAndDescendants();

            $productIdArray = $qb
                ->select("p")
                ->innerJoin('p.ProductCategories', 'pct')
                ->innerJoin('pct.Category', 'c')
                ->andWhere($qb->expr()->in('pct.Category', ':Categories'))
                ->setParameter('Categories', $Categories)
                ->getQuery()->getResult();

            return $productIdArray;
        }
    }



}