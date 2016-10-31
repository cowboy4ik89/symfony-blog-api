<?php

namespace BlogBundle\Event\EventInterface;

use BlogBundle\Entity\EntityInterface\BlogBundleEntityInterface;

/**
 * Interface EntityEventInterface
 * @package BlogBundle\Event\EventInterface
 */
interface EntityEventInterface extends BlogBundleEventInterface
{
    public function __construct(
        BlogBundleEntityInterface $entity,
        string $eventType,
        string $eventName
    );
}
