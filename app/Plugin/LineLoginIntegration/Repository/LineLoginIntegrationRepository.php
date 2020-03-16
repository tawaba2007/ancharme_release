<?php

namespace Plugin\LineLoginIntegration\Repository;

use Doctrine\ORM\EntityRepository;
use Eccube\Common\Constant;
use Plugin\LineLoginIntegration\Entity\LineLoginIntegration;

class LineLoginIntegrationRepository extends EntityRepository
{

    public $app;

    public function setApplication($app)
    {
        $this->app = $app;
    }

    public function deleteLineAssociation(LineLoginIntegration $lineLoginIntegration)
    {
        $em = $this->getEntityManager();
        $em->getConnection()->beginTransaction();
        try {
            $em->remove($lineLoginIntegration);
            $em->flush();

            $em->getConnection()->commit();
        } catch (\Exception $e) {
            $em->getConnection()->rollback();
            return false;
        }

        return true;
    }
}
