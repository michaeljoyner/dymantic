<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/13/2014
 * Time: 11:42 AM
 */

namespace Dymantic\Eventing;


use ReflectionClass;

class EventListener {

    /**
     * @param $event
     * @return mixed
     */
    public function handle($event)
    {
        $eventName = $this->getEventName($event);


        if ($this->listenerIsRegistered($eventName))
        {
            return call_user_func([$this, 'when' . $eventName], $event);
        }
    }

    /**
     * @param $eventName
     * @internal param $method
     * @return bool
     */
    protected function listenerIsRegistered($eventName)
    {
        $method = "when{$eventName}";
        return method_exists($this, $method);
    }

    /**
     * @param $event
     * @return string
     */
    protected function getEventName($event)
    {
        return (new ReflectionClass($event))->getShortName();
    }

}