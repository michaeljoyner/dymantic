<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/10/2014
 * Time: 11:52 AM
 */

namespace Dymantic\Eventing;


trait EventGenerator {

    protected $pendingEvents = [];

    /**
     * @param $event
     */
    public function raise($event)
    {
        $this->pendingEvents[] = $event;
    }

    /**
     * @return array
     */
    public function releaseEvents()
    {
        $events = $this->pendingEvents;

        $this->pendingEvents = [];

        return $events;
    }
}