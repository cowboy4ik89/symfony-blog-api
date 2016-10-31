<?php

namespace BlogBundle\Event\EntityEvent;

use BlogBundle\Entity\EntityInterface\BlogBundleEntityInterface;
use BlogBundle\Event\AbstractEvent;

/**
 * Class BlogEntityCreate
 * @package BlogBundle\Event\EntityCreate
 */
class EntityEvent extends AbstractEvent
{
    /**
     * @var BlogBundleEntityInterface
     */
    private $entity;

    /**
     * @var string
     */
    private $eventType;

    /**
     * @var string
     */
    private $eventName;


    /**
     * EntityEvent constructor.
     *
     * @param BlogBundleEntityInterface $entity
     * @param string                    $eventType
     * @param string                    $eventName
     */
    public function __construct(
        BlogBundleEntityInterface $entity,
        string $eventType,
        string $eventName
    ) {
        $this->entity = $entity;
        $this->eventType = $eventType;
        $this->eventName = $eventName;
    }

    /**
     * @return mixed
     */
    public function getEntity(): BlogBundleEntityInterface
    {
        return $this->entity;
    }

    /**
     * @return string
     */
    public function getEventType(): string
    {
        return $this->eventType;
    }

    /**
     * @example_output: blog_bundle.event.entity_create.blog
     *
     * @return string
     */
    public function getEventName(): string
    {

        return $this->eventName;
    }
}
