<?php

namespace BlogBundle\EventListener\EntityListener;

use BlogBundle\Event\EventInterface\BlogBundleEventInterface;

/**
 * Interface EntityUpdateEventListenerInterface
 * @package BlogBundle\Event\EventListener\EntityListener
 */
interface EntityUpdateEventListenerInterface
{
    /**
     * @param BlogBundleEventInterface $event
     */
    public function onEntityUpdate(BlogBundleEventInterface $event);
}