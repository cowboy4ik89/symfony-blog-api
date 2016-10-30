<?php

namespace BlogBundle\Event\EventInterface;

/**
 * Interface NamedEventInterface
 * @package BlogBundle\Event\EventInterface
 */
interface NamedEventInterface
{
    /**
     * @return string
     */
    public function getEventName(): string;
}
