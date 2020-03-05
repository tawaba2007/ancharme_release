<?php
/*
 * GtmLite: Google Tag Manager コンテナタグ設置プラグイン
 * Copyright (C) 2017 Freischtide Inc. All Rights Reserved.
 * http://freischtide.tumblr.com/
 *
 * License: see LICENSE.txt
 */

namespace Plugin\GtmLite\Repository;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Security\Core\Util\SecureRandom;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

/**
 * plg_gtmlite_plugin テーブルのリポジトリクラス
 */
class GtmLiteRepository extends EntityRepository
{
    /**
     * @param  string $code
     * @return \Plugin\GtmLite\Entity\GtmLite
     */
    public function findByCode($code)
    {
        $gtmLite = $this->findOneBy(array('code' => $code));

        return $gtmLite;
    }

    /**
     * @param  \Plugin\GtmLite\Entity\GtmLite $gtmLite
     * @return bool
     */
    public function save(\Plugin\GtmLite\Entity\GtmLite $gtmLite)
    {
        $em = $this->getEntityManager();
        $em->getConnection()->beginTransaction();
        try {
            $em->persist($gtmLite);
            $em->flush();
            $em->getConnection()->commit();
        } catch (\Exception $e) {
            $em->getConnection()->rollback();
            return false;
        }
        return true;
    }
}
