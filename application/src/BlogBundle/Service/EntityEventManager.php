<?php

namespace BlogBundle\Service;

use BlogBundle\Entity\EntityInterface\EventableEntityInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class EntityEventManager
{
    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(
        EventDispatcherInterface $eventDispatcher
    ) {
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @param EventableEntityInterface $entity
     */
    public function dispatchEntityCreatedEvent(EventableEntityInterface $entity)
    {
        $this->eventDispatcher->dispatch(
            $entity->getEntityCreateEvent()->getEventName(),
            $entity->getEntityCreateEvent()
        );
    }

    /**
     * @param EventableEntityInterface $entity
     */
    public function dispatchEntityUpdatedEvent(EventableEntityInterface $entity)
    {
        $this->eventDispatcher->dispatch(
            $entity->getEntityCreateEvent()->getEventName(),
            $entity->getEntityCreateEvent()
        );
    }

    /**
     * @param EventableEntityInterface $entity
     */
    public function dispatchEntityDeletedEvent(EventableEntityInterface $entity)
    {
        $this->eventDispatcher->dispatch(
            $entity->getEntityCreateEvent()->getEventName(),
            $entity->getEntityCreateEvent()
        );
    }
}