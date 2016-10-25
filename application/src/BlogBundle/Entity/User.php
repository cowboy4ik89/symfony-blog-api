<?php

namespace BlogBundle\Entity;

use BlogBundle\Entity\EntityInterface\BlogBundleEntityInterface;
use BlogBundle\Event\EventInterface\NamedEventInterface;
use Symfony\Component\EventDispatcher\Event;

class User implements BlogBundleEntityInterface
{
    /**
     * @return NamedEventInterface|Event
     */
    public function getEntityCreateEvent()
    {
        // TODO: Implement getEntityCreateEvent() method.
    }

    /**
     * @return NamedEventInterface|Event
     */
    public function getEntityUpdateEvent()
    {
        // TODO: Implement getEntityUpdateEvent() method.
    }

    /**
     * @return NamedEventInterface|Event
     */
    public function getEntityRemoveEvent()
    {
        // TODO: Implement getEntityRemoveEvent() method.
    }

}