<?php

namespace BlogBundle\EntityManagement;

use BlogBundle\Entity\EntityInterface\BlogBundleEntityInterface;
use BlogBundle\Event\EventInterface\BlogBundleEventInterface;

/**
 * Class EntityEventBuilder
 * @package BlogBundle\Entity\EntityEventBuilder
 */
class EntityEventBuilder
{
    const ENTITY_EVENT_CLASS = "BlogBundle\\Event\\EntityEvent\\EntityEvent";

    /**
     * @var EntityEventNameBuilder
     */
    private $entityEventNameBuilder;

    /**
     * EntityEventBuilder constructor.
     *
     * @param EntityEventNameBuilder $entityEventNameBuilder
     */
    public function __construct(EntityEventNameBuilder $entityEventNameBuilder)
    {
       $this->entityEventNameBuilder = $entityEventNameBuilder;
    }

    /**
     * @param BlogBundleEntityInterface $entity
     * @param                           $eventType
     *
     * @return BlogBundleEventInterface
     */
    public function buildEvent(
        BlogBundleEntityInterface $entity,
        string $eventType
    ): BlogBundleEventInterface {
        $eventClass = self::ENTITY_EVENT_CLASS;
        $eventName = $this->entityEventNameBuilder->buildEntityEventName($entity, $eventType);

        return new $eventClass($entity, $eventType, $eventName);
    }
}
