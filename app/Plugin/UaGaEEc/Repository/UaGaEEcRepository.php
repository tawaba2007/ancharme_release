<?php
/*
 * UaGaEEc: Google Analytics eコマース/拡張eコマース対応プラグイン
 * Copyright (C) 2016-2017 Freischtide Inc. All Rights Reserved.
 * http://freischtide.tumblr.com/
 *
 * License: see LICENSE.txt
 */

namespace Plugin\UaGaEEc\Repository;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Security\Core\Util\SecureRandom;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

/**
 * plg_uagaeec_plugin テーブルのリポジトリクラス
 */
class UaGaEEcRepository extends EntityRepository
{
    /**
     * @param  string $code
     * @return \Plugin\UaGaEEc\Entity\UaGaEEc
     */
    public function findByCode($code)
    {
        $uaGaEEc = $this->findOneBy(array('code' => $code));
        $uaGaEEc->getCustomReferrers(); // for set each custom referrer

        return $uaGaEEc;
    }

    /**
     * @param  \Plugin\UaGaEEc\Entity\UaGaEEc $uaGaEEc
     * @param  array $custom_referrer_keys
     * @param  array $custom_referrer_values
     * @return bool
     */
    public function save(\Plugin\Uagaeec\Entity\UaGaEEc $uaGaEEc, $custom_referrer_keys, $custom_referrer_values)
    {
        $uaGaEEc->setCustomReferrers($custom_referrer_keys, $custom_referrer_values);
        $em = $this->getEntityManager();
        $em->getConnection()->beginTransaction();
        try {
            $em->persist($uaGaEEc);
            $em->flush();
            $em->getConnection()->commit();
        } catch (\Exception $e) {
            $em->getConnection()->rollback();
            return false;
        }
        return true;
    }
}
