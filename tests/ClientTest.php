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
        $clientData = [
            'name' => 'Isomark',
            'contact_person' => 'Gerhart Bourshat',
            'contact_email' => 'shemail@example.com',
            'description' => 'Occupation Health and Safety Organization'
        ];

        $this->loginAsAValidUser(['email' => 'joe@example.com']);

        $this->click('Clients')
            ->andClick('Add')
            ->andSubmitForm('Add', $clientData)
            ->verifyInDatabase('clients', $clientData);

    }

}