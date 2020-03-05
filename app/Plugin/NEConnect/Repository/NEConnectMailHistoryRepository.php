<?php

namespace Plugin\NEConnect\Repository;

use Doctrine\ORM\EntityRepository;

class NEConnectMailHistoryRepository extends EntityRepository
{
    public function getHistoryMax100()
    {
        $qb = $this->createQueryBuilder('h');

        $qb->addOrderBy('h.id', 'DESC');

        $result = $qb->setMaxResults(100)->getQuery()->getResult();

        return $result;
    }
}
