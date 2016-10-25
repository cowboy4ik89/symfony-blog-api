<?php

namespace BlogBundle\Event\EventInterface;

/**
 * Interface BlogBundleEventInterface
 * @package BlogBundle\Event\EventInterface
 */
interface BlogBundleEventInterface extends NamedEventInterface
{
    /**
     * @return string
     */
    public function getEventName();
}
