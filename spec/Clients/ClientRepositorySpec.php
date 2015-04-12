<?php

namespace spec\Dymantic\Clients;

use Dymantic\Clients\Client;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ClientRepositorySpec extends ObjectBehavior
{
    function let(Client $model)
    {
        $this->beConstructedWith($model);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Dymantic\Clients\ClientRepository');
    }
}
