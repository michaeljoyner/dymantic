<?php

namespace Dymantic\Services;

use Dymantic\Briefs\General\GeneralBrief;
use Dymantic\Clients\CreateClientCommand;
use Dymantic\Commanding\CommandBus;
use Dymantic\Projects\CreateProjectCommand;
use Dymantic\Projects\CreateTaskCommand;

class BriefToClientConverter
{

    /**
     * @var CommandBus
     */
    private $commandBus;
    /**
     * @var NameGenerator
     */
    private $nameGenerator;

    public function __construct(CommandBus $commandBus, NameGenerator $nameGenerator)
    {
        $this->commandBus = $commandBus;
        $this->nameGenerator = $nameGenerator;
    }

    public function convertToNewClient(GeneralBrief $generalBrief)
    {
        $clientCommand = $this->makeClientCommand($generalBrief);
        $client = $this->commandBus->execute($clientCommand);

        $generalBrief->converted()->create(['client_id' => $client->id]);

        $projectCommand = $this->makeProjectCommand($client->id, $generalBrief);
        $project = $this->commandBus->execute($projectCommand);

        if($generalBrief->printBriefs->count())
        {
            $printTaskCommand = $this->makeTaskCommand($project->id, $generalBrief->printBriefs->first(), 'Print Design');
            $printTask = $this->commandBus->execute($printTaskCommand);
            $brief = $generalBrief->printBriefs->first();
            foreach($brief->printImages as $image)
            {
                $printTask->taskFiles()->create(['filepath' => $image->imagepath]);
            }
            foreach($brief->printDocs as $doc)
            {
                $printTask->taskFiles()->create(['filepath' => $doc->documentpath]);
            }
        }

        if($generalBrief->logoBriefs->count())
        {
            $logoTaskCommand = $this->makeTaskCommand($project->id, $generalBrief->logoBriefs->first(), 'Logo Design');
            $logoTask = $this->commandBus->execute($logoTaskCommand);
            $logoBrief = $generalBrief->logoBriefs->first();
            foreach ($logoBrief->logoFiles as $file)
            {
                $logoTask->taskFiles()->create(['filepath' => $file->imagepath]);
            }

        }

        if($generalBrief->siteBriefs->count())
        {
            $siteTaskCommand = $this->makeTaskCommand($project->id, $generalBrief->siteBriefs->first(), 'Web Design');
            $this->commandBus->execute($siteTaskCommand);
        }
    }

    private function makeClientCommand(GeneralBrief $generalBrief)
    {
        $data = [];
        $data['name'] = $generalBrief->company;
        $data['contact_person'] = $generalBrief->contact_person;
        $data['contact_email'] = $generalBrief->email;
        $data['industry'] = $generalBrief->industry;
        $data['website'] = $generalBrief->current_website;
        $data['operating_since'] = $generalBrief->since;
        $data['description'] = "Background:<br>".$generalBrief->background."<br><br>In a Nutshell:\n".$generalBrief->nutshell;
        $data['image_path'] = null;

        return new CreateClientCommand($data);
    }

    private function makeProjectCommand($client_id, GeneralBrief $generalBrief)
    {
        $data = [];
        $data['name'] = $this->nameGenerator->generate();
        $data['description'] = $generalBrief->reaction;

        return new CreateProjectCommand($client_id, $data);
    }

    private function makeTaskCommand($project_id, $brief, $name)
    {
        $data = [];
        $data['name'] = $name;
        $data['brief'] = $brief->present()->briefAsHtml();
        $data['notes'] = 'New task from site brief';
        $data['deadline'] = 'Unset';
        $data['status'] = 'Underway';

        return new CreateTaskCommand($project_id, $data);
    }
}
