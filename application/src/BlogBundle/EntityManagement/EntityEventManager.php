<?php

namespace BlogBundle\EntityManagement;

use BlogBundle\Entity\EntityInterface\BlogBundleEntityInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\VarDumper\VarDumper;

/**
 * Class EntityEventManager
 * @package BlogBundle\Entity
 */
class EntityEventManager
{
    const ENTITY_EVENT_TYPE_CREATE = 'EntityCreate';
    const ENTITY_EVENT_TYPE_UPDATE = 'EntityUpdate';
    const ENTITY_EVENT_TYPE_REMOVE = 'EntityRemove';

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var EntityEventBuilder
     */
    private $entityEventBuilder;

    /**
     * EntityEventManager constructor.
     *
     * @param EventDispatcherInterface $eventDispatcher
     * @param EntityEventBuilder       $entityEventBuilder
     */
    public function __construct(
        EventDispatcherInterface $eventDispatcher,
        EntityEventBuilder $entityEventBuilder
    ) {
        $this->eventDispatcher = $eventDispatcher;
        $this->entityEventBuilder = $entityEventBuilder;
    }

    /**
     * @param BlogBundleEntityInterface $entity
     */
    public function dispatchEntityCreatedEvent(BlogBundleEntityInterface $entity)
    {
        $event = $this->entityEventBuilder->buildEvent($entity, self::ENTITY_EVENT_TYPE_CREATE);

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
        $event = $this->entityEventBuilder->buildEvent($entity, self::ENTITY_EVENT_TYPE_UPDATE);

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
        $event = $this->entityEventBuilder->buildEvent($entity, self::ENTITY_EVENT_TYPE_REMOVE);

        $this->eventDispatcher->dispatch(
            $event->getEventName(),
            $event
        );
    }
}
