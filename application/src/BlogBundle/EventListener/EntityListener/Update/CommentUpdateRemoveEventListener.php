<?php

namespace BlogBundle\EventListener\EntityListener\Update;

use BlogBundle\Event\EventInterface\BlogBundleEventInterface;
use BlogBundle\EventListener\EntityListener\EntityUpdateEventListenerInterface;

/**
 * Class CommentEntityUpdateEventListener
 * @package BlogBundle\Event\EventListener\EntityListener\Update
 */
class CommentEntityUpdateEventListener implements EntityUpdateEventListenerInterface
{
    /**
     * @param BlogBundleEventInterface $event
     */
    public function onEntityUpdate(BlogBundleEventInterface $event)
    {
        // TODO: Implement onEntityUpdate() method.
    }
}