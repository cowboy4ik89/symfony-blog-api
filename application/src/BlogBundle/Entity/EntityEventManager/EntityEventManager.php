<?php

namespace BlogBundle\Entity\EntityEventManager;

use BlogBundle\Entity\EntityInterface\BlogBundleEntityInterface;
use BlogBundle\Event\EventInterface\BlogBundleEventInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class EntityEventManager
 * @package BlogBundle\Entity
 */
class EntityEventManager
{
    const ENTITY_EVENT_TYPE_CREATE = 'EntityCreate';
    const ENTITY_EVENT_TYPE_UPDATE = 'EntityUpdate';
    const ENTITY_EVENT_TYPE_REMOVE = 'EntityRemove';

    const ENTITY_EVENT_CLASS = "BlogBundle\\Event\\EntityEvent\\EntityEvent";

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * EntityEventManager constructor.
     *
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(
        EventDispatcherInterface $eventDispatcher
    ) {
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @param BlogBundleEntityInterface $entity
     */
    public function dispatchEntityCreatedEvent(BlogBundleEntityInterface $entity)
    {
        $event = $this->buildEvent($entity, self::ENTITY_EVENT_TYPE_CREATE);

        $this->eventDispatcher->dispatch(
            $event->getEventName(),
            $event
        );
    }

    /**
     * @param BlogBundleEntityInterface $entity
     */
    public function dispatchEntityUpdatedEvent(BlogBundleEntityInterface $entity)
    {
        $event = $this->buildEvent($entity, self::ENTITY_EVENT_TYPE_UPDATE);

        $this->eventDispatcher->dispatch(
            $event->getEventName(),
            $event
        );
    }

    /**
     * @param BlogBundleEntityInterface $entity
     */
    public function dispatchEntityRemovedEvent(BlogBundleEntityInterface $entity)
    {
        $event = $this->buildEvent($entity, self::ENTITY_EVENT_TYPE_REMOVE);

        $this->eventDispatcher->dispatch(
            $event->getEventName(),
            $event
        );
    }

    /**
     * @param BlogBundleEntityInterface $entity
     * @param                           $eventType
     *
     * @return BlogBundleEventInterface
     */
    private function buildEvent(BlogBundleEntityInterface $entity, $eventType): BlogBundleEventInterface
    {
        $eventClass = self::ENTITY_EVENT_CLASS;

        return new $eventClass($entity, $eventType);
    }
}