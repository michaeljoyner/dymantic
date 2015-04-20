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
        $this->call('BriefsSeeder');

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

class BriefsSeeder extends Seeder {
    public function run()
    {
        DB::table('generalbriefs')->delete();
        DB::table('logobriefs')->delete();
        DB::table('sitebriefs')->delete();
        DB::table('printbriefs')->delete();

        $generalBrief = TestDummy::create('Dymantic\Briefs\PrintBriefs\PrintBrief');


        TestDummy::create('Dymantic\Briefs\PrintBriefs\PrintBrief', ['generalbrief_id' => $generalBrief->id]);
        TestDummy::create('Dymantic\Briefs\Site\SiteBrief', ['generalbrief_id' => $generalBrief->id]);
        TestDummy::create('Dymantic\Briefs\Logo\LogoBrief', ['generalbrief_id' => $generalBrief->id]);

        TestDummy::create('Dymantic\Briefs\PrintBriefs\PrintBrief');
        TestDummy::create('Dymantic\Briefs\Site\SiteBrief');
        TestDummy::create('Dymantic\Briefs\Logo\LogoBrief');

    }
}