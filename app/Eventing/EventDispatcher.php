<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/11/2014
 * Time: 9:56 AM
 */

namespace Dymantic\Eventing;


use Illuminate\Events\Dispatcher;
use Illuminate\Log\Writer;

class EventDispatcher {

    /**
     * @var Dispatcher
     */
    private $dispatcher;
    /**
     * @var Writer
     */
    private $log;

    public function __construct(Writer $log, Dispatcher $dispatcher)
    {

        $this->dispatcher = $dispatcher;
        $this->log = $log;
    }

    public function dispatch(array $events)
    {
        foreach($events as $event)
        {
            $eventName = $this->getEventName($event);
            $this->dispatcher->fire($eventName, $event);
            $this->log->info("Event [$eventName] was fired");
        }
    }

    /**
     * @param $event
     * @return mixed
     */
    protected function getEventName($event)
    {
        return str_replace('\\', '.', get_class($event));
    }

}