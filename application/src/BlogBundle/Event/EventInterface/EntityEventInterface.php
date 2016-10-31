<?php

namespace BlogBundle\Event\EventInterface;

use BlogBundle\Entity\EntityInterface\BlogBundleEntityInterface;

/**
 * Interface EntityEventInterface
 * @package BlogBundle\Event\EventInterface
 */
interface EntityEventInterface extends BlogBundleEventInterface
{
    /**
     * EntityEventInterface constructor.
     *
     * @param BlogBundleEntityInterface $entity
     * @param string                    $eventType
     * @param string                    $eventName
     */
    public function __construct(
        BlogBundleEntityInterface $entity,
        string $eventType,
        string $eventName
    );
}
