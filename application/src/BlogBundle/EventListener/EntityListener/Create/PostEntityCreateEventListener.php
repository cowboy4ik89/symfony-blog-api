<?php

namespace BlogBundle\EventListener\EntityListener\Create;

use BlogBundle\Event\EventInterface\BlogBundleEventInterface;
use BlogBundle\EventListener\EntityListener\EntityCreateEventListenerInterface;

/**
 * Class PostEntityCreateEventListener
 * @package BlogBundle\Event\EventListener\EntityListener\Create
 */
class PostEntityCreateEventListener implements EntityCreateEventListenerInterface
{
    /**
     * @param BlogBundleEventInterface $event
     */
    public function onEntityCreate(BlogBundleEventInterface $event)
    {
        // TODO: Implement onEntityCreate() method.
    }
}