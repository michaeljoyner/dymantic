<?php

use Laracasts\Integrated\Services\Laravel\DatabaseTransactions;
use Laracasts\TestDummy\Factory as TestDummy;

/**
 * Created by PhpStorm.
 * User: carol
 * Date: 4/11/15
 * Time: 11:25 PM
 */
class ClientTest extends TestCase {

    use DatabaseTransactions;

    /**
     * @test
     */
    public function itListsTheClients()
    {
        TestDummy::create('Dymantic\Clients\Client', ['name' => 'mooz']);
        TestDummy::create('Dymantic\Clients\Client', ['name' => 'carol']);

        $this->loginAsAValidUser(['email' => 'joe@example.com']);
        $this->click('Clients')
             ->andSee('mooz')
             ->andSee('carol');

    }

    /**
     * @test
     */
    public function itCreatesNewClients()
    {
        $clientData = $this->createNewClient();
        $this->verifyInDatabase('clients', $clientData);

    }

    /**
     * @test
     */
    public function itCanShowAClientsInfo()
    {
        $clientData = $this->createNewClient();
        $this->andSeePageIs('admin/clients')
             ->andClick($clientData['name'])
             ->andSee($clientData['name'])
             ->andSee($clientData['contact_person'])
             ->andSee($clientData['contact_email']);

    }

    /**
     * @test
     */
    public function itShowsTheNumberOfProjectsForEachClient()
    {
        $client = $this->createNewClient();
        $this->see('Projects: 0');
    }

    /**
     * @test
     */
    public function itCanAddAProjectToAClient()
    {
        $projectData = [
            'description' => 'A totaly new project',
        ];
        $client = $this->createNewClient();
        $this->click($client['name'])
            ->andClick('Project')
            ->andSubmitForm('Start Project', $projectData)
            ->andVerifyInDatabase('projects', $projectData);
    }

    /**
     * @test
     */
    public function itShowsProjectsBelongingToClients()
    {
        $clientName = 'Isomark';
        $client = TestDummy::create('Dymantic\Clients\Client', ['name' => $clientName]);
        $project1 = TestDummy::create('Dymantic\Projects\Project', ['client_id' => $client->id]);
        $project2 = TestDummy::create('Dymantic\Projects\Project', ['client_id'=> $client->id]);

        $this->loginAsAValidUser(['email' => 'joe@example.com']);
        $this->click('Clients')
            ->andClick($clientName)
            ->andSee($project1->description)
            ->andSee($project2->description);
    }

    protected function createNewClient()
    {
        $clientData = [
            'name'            => 'Isomark',
            'contact_person'  => 'Gerhart Bourshat',
            'contact_email'   => 'shemail@example.com',
            'description'     => 'Occupation Health and Safety Organization',
            'website'         => 'domainname.com',
            'industry'        => 'Agriculture',
            'operating_since' => '2001'
        ];

        $this->loginAsAValidUser(['email' => 'joe@example.com']);

        $this->click('Clients')
             ->andClick('Add')
             ->andSeePageIs('admin/clients/create')
             ->andSubmitForm('Add', $clientData);
        return $clientData;
    }

}