<?php
namespace PhpForce\Common;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\Event;

/**
 * Can be extended by classes that dispatch events using the event dispatcher
 *
 */
abstract class AbstractHasDispatcher
{
    /**
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;

    /**
     * Set event dispatcher
     *
     * @param EventDispatcherInterface $eventDispacher
     */
    public function setEventDispacher(EventDispatcherInterface $eventDispacher)
    {
        $this->eventDispacher = $eventDispacher;
    }

    /**
     * Get event dispatcher
     *
     * If no event dispatcher is supplied, a new one is created. This one will
     * then be used internally by the Accelerate library.
     *
     * @return EventDispatcherInterface
     */
    public function getEventDispatcher()
    {
        if (null == $this->eventDispatcher) {
            $this->eventDispatcher = new EventDispatcher();
        }

        return $this->eventDispatcher;
    }

    /**
     * Dispatch an event
     *
     * @param string $name  Name of event: see Events.php
     * @param type   $event Event object
     */
    protected function dispatch($name, Event $event)
    {
        $this->getEventDispatcher()->dispatch($name, $event);
    }
}

