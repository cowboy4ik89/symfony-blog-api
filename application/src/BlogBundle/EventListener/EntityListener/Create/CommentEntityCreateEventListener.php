<?php

namespace BlogBundle\EventListener\EntityListener\Create;

use BlogBundle\Event\EventInterface\BlogBundleEventInterface;
use BlogBundle\EventListener\EntityListener\EntityCreateEventListenerInterface;

/**
 * Class CommentEntityCreateEventListener
 * @package BlogBundle\Event\EventListener\EntityListener\Create
 */
class CommentEntityCreateEventListener implements EntityCreateEventListenerInterface
{
    /**
     * @param BlogBundleEventInterface $event
     */
    public function onEntityCreate(BlogBundleEventInterface $event)
    {
        // TODO: Implement onEntityCreate() method.
    }
}