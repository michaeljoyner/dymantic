<?php

namespace spec\Dymantic\Projects;

use Dymantic\Projects\Project;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProjectRepositorySpec extends ObjectBehavior
{
    function let(Project $model)
    {
        $this->beConstructedWith($model);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Dymantic\Projects\ProjectRepository');
    }
}
