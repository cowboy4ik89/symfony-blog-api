<?php

namespace BlogBundle\EventListener\EntityListener;

use BlogBundle\Event\EventInterface\BlogBundleEventInterface;

/**
 * Interface EntityCreateEventListenerInterface
 * @package BlogBundle\Event\EventListener\EntityListener
 */
interface EntityCreateEventListenerInterface
{
    /**
     * @param BlogBundleEventInterface $event
     */
    public function onEntityCreate(BlogBundleEventInterface $event);
}