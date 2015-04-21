<?php

namespace spec\Dymantic\Presenters;

use Dymantic\Clients\Client;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ClientPresenterSpec extends ObjectBehavior
{
    function let(Client $entity)
    {
        $this->beConstructedWith($entity);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Dymantic\Presenters\ClientPresenter');
    }
}
