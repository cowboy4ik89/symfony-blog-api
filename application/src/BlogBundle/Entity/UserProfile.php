<?php

namespace BlogBundle\Entity;

use BlogBundle\Event\EventInterface\NamedEventInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class UserProfile
 * @package BlogBundle\Entity
 */
class UserProfile extends AbstractEntity
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