<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11/24/2014
 * Time: 10:29 AM
 */

namespace Dymantic\Presenters;


abstract class Presenter {

    protected $entity;

    /**
     * @param $entity
     */
    function __construct($entity)
    {
        $this->entity = $entity;
    }

    /**
     * @param $property
     * @return mixed
     */
    public function __get($property)
    {
        if(method_exists($this, $property))
        {
            return $this->{$property}();
        }

        return $this->entity->{$property};
    }

}