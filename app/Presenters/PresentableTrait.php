<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11/24/2014
 * Time: 10:11 AM
 */

namespace Dymantic\Presenters;


use App\Presenters\Exceptions\PresenterException;

trait PresentableTrait {

    protected $presenterInstance;

    public function present()
    {
        if ( ! $this->presenter || ! class_exists($this->presenter))
        {
            throw new PresenterException('Please set the protected $presenter property on this class');
        }

        if ( ! $this->presenterInstance)
        {
            $this->presenterInstance = new $this->presenter($this);
        }

        return $this->presenterInstance;
    }
}