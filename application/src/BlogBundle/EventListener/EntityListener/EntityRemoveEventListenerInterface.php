<?php

namespace BlogBundle\EventListener\EntityListener;

use BlogBundle\Event\EventInterface\BlogBundleEventInterface;

/**
 * Interface EntityRemoveEventListenerInterface
 * @package BlogBundle\Event\EventListener\EntityListener
 */
interface EntityRemoveEventListenerInterface
{
    /**
     * @param BlogBundleEventInterface $event
     */
    public function onEntityRemove(BlogBundleEventInterface $event);
}