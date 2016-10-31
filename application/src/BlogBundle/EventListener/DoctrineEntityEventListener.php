<?php

namespace BlogBundle\EventListener;

use BlogBundle\EntityManagement\EntityEventManager;
use BlogBundle\Entity\EntityInterface\BlogBundleEntityInterface;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreFlushEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

/**
 * Class DoctrineEventListener
 * @package BlogBundle\Event\EventListener\EntityEventListener
 */
class DoctrineEntityEventListener
{
    /**
     * @var EntityEventManager
     */
    private $entityEventManager;

    /**
     * DoctrineEventListener constructor.
     *
     * @param EntityEventManager $entityEventManager
     */
    public function __construct(EntityEventManager $entityEventManager)
    {
        $this->entityEventManager = $entityEventManager;
    }

    /**
     *
     * Experimental way. Need to be tested. Usage:
     *  1. Make all doctrine listener methods protected or private.
     *  2. remove from doctrine listener methods as they will be called magicly:
     *      $entity = $event->getEntity();
     *
     *      if (!$this->isDispatchableEntityEvent($entity)) return;
     *
     *  3. change method definitions from:
     *
     *          LifecycleEventArgs $event
     *
     *     to:
     *
     *          BlogBundleEntityInterface $entity
     *
     * @param string       $name
     * @param array        $arguments
     *
        public function __call($name, $arguments)
        {
            $event = $arguments[0];

            if ($event instanceof PreFlushEventArgs) {
                return $this->$name($event);
            }

            if ($this->isDispatchableEntityEvent($event->getEntity())) {
                return $this->$name($event->getEntity());
            }

            return;
        }
     */

    /**
     * prePersist - The prePersist event occurs for a given entity
     *              before the respective EntityManager persist operation
     *              for that entity is executed.
     *
     * It should be noted that this event is
     * only triggered on initial persist of an entity
     * (i.e. it does not trigger on future updates).
     *
     * @param LifecycleEventArgs $event
     */
    public function prePersist(LifecycleEventArgs $event)
    {
        $entity = $event->getEntity();

        if (!$this->isDispatchableEntityEvent($entity)) return;


        /** @var $entity BlogBundleEntityInterface */
        $this->entityEventManager->dispatchEntityCreatedEvent($entity);
    }

    /**
     * postPersist - The postPersist event occurs for an entity
     *               after the entity has been made persistent.
     *
     * It will be invoked after the database insert operations.
     * Generated primary key values are available in the postPersist event.
     *
     * @param LifecycleEventArgs $event
     */
    public function postPersist(LifecycleEventArgs $event)
    {
        $entity = $event->getEntity();

        if (!$this->isDispatchableEntityEvent($entity)) return;

        /** @var $entity BlogBundleEntityInterface */
        $this->entityEventManager->dispatchEntityCreatedEvent($entity);
    }

    /**
     * preUpdate - The preUpdate event occurs before
     *             the database update operations to entity data.
     *
     * It is not called for a DQL UPDATE statement
     * nor when the computed changeset is empty.
     *
     * @param PreUpdateEventArgs $event
     */
    public function preUpdate(PreUpdateEventArgs $event)
    {
        $entity = $event->getEntity();

        if (!$this->isDispatchableEntityEvent($entity)) return;
    }

    /**
     * postUpdate - The postUpdate event occurs after
     *              the database update operations to entity data.
     *
     * It is not called for a DQL UPDATE statement.
     *
     * @param LifecycleEventArgs $event
     */
    public function postUpdate(LifecycleEventArgs $event)
    {
        $entity = $event->getEntity();

        if (!$this->isDispatchableEntityEvent($entity)) return;

        /** @var $entity BlogBundleEntityInterface */
        $this->entityEventManager->dispatchEntityUpdatedEvent($entity);
    }

    /**
     * postRemove - The postRemove event occurs for an entity
     *              after the entity has been deleted.
     *              It will be invoked after the database delete operations.
     *
     * It is not called for a DQL DELETE statement.
     *
     * @param LifecycleEventArgs $event
     */
    public function postRemove(LifecycleEventArgs $event)
    {
        $entity = $event->getEntity();

        if (!$this->isDispatchableEntityEvent($entity)) return;

        /** @var $entity BlogBundleEntityInterface */
        $this->entityEventManager->dispatchEntityRemovedEvent($entity);
    }

    /**
     * preRemove - The preRemove event occurs for a given entity
     *             before the respective EntityManager remove operation
     *             for that entity is executed.
     *
     * It is not called for a DQL DELETE statement.
     *
     * @param LifecycleEventArgs $event
     */
    public function preRemove(LifecycleEventArgs $event)
    {
        $entity = $event->getEntity();

        if (!$this->isDispatchableEntityEvent($entity)) return;
    }

    /**
     * The preFlush event occurs at the very beginning of a flush operation.
     *
     * @param PreFlushEventArgs $event
     */
    public function preFlush(PreFlushEventArgs $event)
    {
    }

    /**
     * postLoad - The postLoad event occurs for an entity after
     *            the entity has been loaded into the current EntityManager
     *            from the database or after the refresh operation
     *            has been applied to it.
     *
     * @param LifecycleEventArgs $event
     */
    public function postLoad(LifecycleEventArgs $event)
    {
        $entity = $event->getEntity();

        if (!$this->isDispatchableEntityEvent($entity)) return;
    }

    /**
     * @param $entity
     *
     * @return bool
     */
    private function isDispatchableEntityEvent($entity)
    {
        return ($entity instanceof BlogBundleEntityInterface);
    }
}
