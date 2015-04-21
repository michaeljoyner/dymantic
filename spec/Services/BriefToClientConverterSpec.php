<?php

namespace spec\Dymantic\Services;

use Dymantic\Briefs\General\GeneralBrief;
use Dymantic\Briefs\Logo\LogoBrief;
use Dymantic\Briefs\PrintBriefs\PrintBrief;
use Dymantic\Briefs\Site\SiteBrief;
use Dymantic\Clients\Client;
use Dymantic\Clients\CreateClientCommand;
use Dymantic\Commanding\CommandBus;
use Dymantic\Projects\CreateProjectCommand;
use Dymantic\Projects\CreateTaskCommand;
use Dymantic\Projects\Project;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BriefToClientConverterSpec extends ObjectBehavior
{
    function let(CommandBus $commandBus)
    {
        $this->beConstructedWith($commandBus);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Dymantic\Services\BriefToClientConverter');
    }

    function it_converts_a_general_brief_to_a_new_client(
        CommandBus $commandBus,
        CreateClientCommand $clientCommand,
        CreateProjectCommand $projectCommand,
        CreateTaskCommand $taskCommand,
        GeneralBrief $generalBrief,
        PrintBrief $printBrief,
        LogoBrief $logoBrief,
        SiteBrief $siteBrief,
        Client $client,
        Project $project
    )
    {
//        $clientCommand->description = 'Background:\n\n\nIn a Nutshell:\n';
        $commandBus->execute($clientCommand)->shouldBeCalled()->willReturn($client);
//        $client->id = 1;
        $commandBus->execute($projectCommand)->shouldBeCalled()->willReturn($project);
        $project->id = 1;
        $this->convertToNewClient($generalBrief);
    }
}
