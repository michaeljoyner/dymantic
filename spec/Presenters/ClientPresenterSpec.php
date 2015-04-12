<?php

namespace spec\Dymantic\Presenters;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ClientPresenterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Dymantic\Presenters\ClientPresenter');
    }
}
