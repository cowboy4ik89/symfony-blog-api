<?php

namespace BlogBundle\EntityManagement;

use BlogBundle\Entity\EntityInterface\BlogBundleEntityInterface;
use BlogBundle\Service\StringFormatter;

/**
 * Class EntityEventNameBuilder
 * @package BlogBundle\Entity\EntityEventBuilder
 */
class EntityEventNameBuilder
{
    /**
     * @var StringFormatter
     */
    private $stringFormatter;

    /**
     * EntityEventBuilder constructor.
     *
     * @param StringFormatter $stringFormatter
     */
    public function __construct(StringFormatter $stringFormatter)
    {
        $this->stringFormatter = $stringFormatter;
    }

    /**
     * @param BlogBundleEntityInterface $entity
     * @param string                    $eventType
     *
     * @return string
     */
    public function buildEntityEventName(
        BlogBundleEntityInterface $entity,
        string $eventType
    ): string {
        $entityReflection = new \ReflectionClass($entity);
        $shortEntityName = strtolower($entityReflection->getShortName());
        $eventType = strtolower($this->stringFormatter->toUnderscoreFormat($eventType));
        $eventName = 'blog_bundle.event.' . $eventType . '.' . $shortEntityName;

        return $eventName;
    }
}