<?php

namespace BlogBundle\EventListener\EntityListener\Create;

use BlogBundle\Event\EventInterface\BlogBundleEventInterface;
use BlogBundle\EventListener\EntityListener\EntityCreateEventListenerInterface;
use Symfony\Component\VarDumper\VarDumper;

/**
 * Class BlogEntityCreateEventListener
 * @package BlogBundle\Event\EventListener\EntityListener\Create
 */
class BlogEntityCreateEventListener implements EntityCreateEventListenerInterface
{
    /**
     * @param BlogBundleEventInterface $event
     */
    public function onEntityCreate(BlogBundleEventInterface $event)
    {
        VarDumper::dump($event);
    }
}
