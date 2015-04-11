<?php

use Laracasts\Integrated\Extensions\Laravel as IntegrationTest;
use Laracasts\Integrated\Services\Laravel\DatabaseTransactions;
use Laracasts\TestDummy\Factory as TestDummy;

class TestCase extends IntegrationTest {

    use DatabaseTransactions;

	/**
	 * Creates the application.
	 *
	 * @return \Illuminate\Foundation\Application
	 */
	public function createApplication()
	{
		$app = require __DIR__.'/../bootstrap/app.php';

		$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

		return $app;
	}

    public function setUp()
    {
        parent::setUp();
        \Illuminate\Support\Facades\Artisan::call('migrate');
    }

    protected function loginAsAValidUser($userOverrides)
    {
        TestDummy::create('Dymantic\User', $userOverrides);
        $this->visit('admin/login')
             ->andSubmitForm('Login', array_merge(['password' => 'password'], $userOverrides));
    }



}
