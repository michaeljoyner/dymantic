<?php

namespace spec\Dymantic\Projects;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProjectRepositorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Dymantic\Projects\ProjectRepository');
    }
}
