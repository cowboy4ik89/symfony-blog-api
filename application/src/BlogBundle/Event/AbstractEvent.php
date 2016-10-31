<?php

namespace BlogBundle\Event;

use BlogBundle\Event\EventInterface\EntityEventInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class AbstractEvent
 * @package BlogBundle\Event\EntityCreate
 */
abstract class AbstractEvent extends Event implements EntityEventInterface
{

}
