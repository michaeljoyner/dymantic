<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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
        $this->call('ClientTableSeeder');
    }

}


class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->truncate();
        TestDummy::create('Dymantic\User', ['email' => 'joe@example.com']);
    }
}

class ClientTableSeeder extends Seeder {

    public function run()
    {
        DB::table('clients')->delete();
        TestDummy::times(5)->create('Dymantic\Clients\Client');
    }
}