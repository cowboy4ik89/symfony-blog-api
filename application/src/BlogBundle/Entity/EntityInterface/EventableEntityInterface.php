<?php

namespace BlogBundle\Entity\EntityInterface;

use BlogBundle\Event\EventInterface\NamedEventInterface;
use Symfony\Component\EventDispatcher\Event;

interface EventableEntityInterface
{

    /**
     * @return NamedEventInterface|Event
     */
    public function getEntityCreateEvent();

    /**
     * @return NamedEventInterface|Event
     */
    public function getEntityUpdateEvent();

    /**
     * @return NamedEventInterface|Event
     */
    public function getEntityRemoveEvent();

}