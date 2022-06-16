<?php
namespace Phpforce\Common;

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use Symfony\Contracts\EventDispatcher\Event;

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
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function setEventDispatcher(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
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
     * @param Event  $event Event object
     *
     * @return Event
     */
    protected function dispatch($name, Event $event)
    {
        return $this->getEventDispatcher()->dispatch($event, $name);
    }
}

