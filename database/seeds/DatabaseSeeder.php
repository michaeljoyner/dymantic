<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Laracasts\TestDummy\Factory as TestDummy;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		 $this->call('UserTableSeeder');
	}

}


class UserTableSeeder extends Seeder {

    public function run()
    {
        TestDummy::create('Dymantic\User', ['email' => 'joe@example.com']);
    }
}