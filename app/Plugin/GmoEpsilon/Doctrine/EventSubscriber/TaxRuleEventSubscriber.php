<?php


namespace Plugin\GmoEpsilon\Doctrine\EventSubscriber;

use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;
use Plugin\GmoEpsilon\Entity\RegularOrderDetail;
use Plugin\GmoEpsilon\Entity\RegularShipmentItem;

class TaxRuleEventSubscriber implements EventSubscriber
{
    /**
     * @var \Eccube\Service\TaxRuleService
     */
    private $taxRateService;

    public function __construct(\Eccube\Service\TaxRuleService $taxRateService)
    {
        $this->taxRateService = $taxRateService;
    }

    public function getSubscribedEvents()
    {
        return array(
            Events::prePersist,
            Events::postLoad,
            Events::postPersist,
            Events::postUpdate,
        );
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        if ($entity instanceof RegularOrderDetail) {
            $entity->setPriceIncTax($entity->getPrice() + $this->taxRateService->calcTax($entity->getPrice(), $entity->getTaxRate(), $entity->getTaxRule()));
        }
        if ($entity instanceof RegularShipmentItem) {
            $entity->setPriceIncTax($this->taxRateService->getPriceIncTax($entity->getPrice(), $entity->getProduct(), $entity));
        }
    }

    public function postLoad(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        if ($entity instanceof RegularOrderDetail) {
            $entity->setPriceIncTax($entity->getPrice() + $this->taxRateService->calcTax($entity->getPrice(), $entity->getTaxRate(), $entity->getTaxRule()));
        }
        if ($entity instanceof RegularShipmentItem) {
            $entity->setPriceIncTax($this->taxRateService->getPriceIncTax($entity->getPrice(), $entity->getProduct(), $entity));
        }
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        if ($entity instanceof RegularOrderDetail) {
            $entity->setPriceIncTax($entity->getPrice() + $this->taxRateService->calcTax($entity->getPrice(), $entity->getTaxRate(), $entity->getTaxRule()));
        }
        if ($entity instanceof RegularShipmentItem) {
            $entity->setPriceIncTax($this->taxRateService->getPriceIncTax($entity->getPrice(), $entity->getProduct(), $entity));
        }
    }

    public function postUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        if ($entity instanceof RegularOrderDetail) {
            $entity->setPriceIncTax($entity->getPrice() + $this->taxRateService->calcTax($entity->getPrice(), $entity->getTaxRate(), $entity->getTaxRule()));
        }
        if ($entity instanceof RegularShipmentItem) {
            $entity->setPriceIncTax($this->taxRateService->getPriceIncTax($entity->getPrice(), $entity->getProduct(), $entity));
        }
    }
}
