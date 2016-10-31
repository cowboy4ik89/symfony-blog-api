<?php

namespace BlogBundle\EventListener\EntityListener\Update;

use BlogBundle\Event\EventInterface\BlogBundleEventInterface;
use BlogBundle\Event\EventListener\EntityListener\EntityUpdateEventListenerInterface;

/**
 * Class UserEntityUpdateEventListener
 * @package BlogBundle\Event\EventListener\EntityListener\Update
 */
class UserEntityUpdateEventListener implements EntityUpdateEventListenerInterface
{
    /**
     * @param BlogBundleEventInterface $event
     */
    public function onEntityUpdate(BlogBundleEventInterface $event)
    {
        // TODO: Implement onEntityUpdate() method.
    }
}