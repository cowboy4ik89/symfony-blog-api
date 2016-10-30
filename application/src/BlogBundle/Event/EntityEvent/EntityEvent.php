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
     * EntityEvent constructor.
     *
     * @param BlogBundleEntityInterface $entity
     * @param                           $eventType
     */
    public function __construct(BlogBundleEntityInterface $entity, $eventType)
    {
        $this->entity = $entity;
        $this->eventType = $eventType;
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
        $eventType = $this->toUnderscoreFormat($this->getEventType());
        $entityClass = get_class($this->getEntity());

        return 'blog_bundle.event.' . $eventType . '.' . $entityClass;
    }

    /**
     * @param $string
     *
     * @return string
     */
    private function toUnderscoreFormat($string): string
    {
        return ltrim(strtolower(preg_replace('/[A-Z]/', '_$0', $string)), '_');
    }
}
