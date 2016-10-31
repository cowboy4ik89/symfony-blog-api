<?php

namespace BlogBundle\EventListener\EntityListener\Update;

use BlogBundle\Event\EventInterface\BlogBundleEventInterface;
use BlogBundle\EventListener\EntityListener\EntityUpdateEventListenerInterface;

/**
 * Class PostEntityUpdateEventListener
 * @package BlogBundle\Event\EventListener\EntityListener\Update
 */
class PostEntityUpdateEventListener implements EntityUpdateEventListenerInterface
{
    /**
     * @param BlogBundleEventInterface $event
     */
    public function onEntityUpdate(BlogBundleEventInterface $event)
    {
        // TODO: Implement onEntityUpdate() method.
    }
}