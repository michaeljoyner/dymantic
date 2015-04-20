<?php
use Laracasts\Integrated\Services\Laravel\DatabaseTransactions;
use Laracasts\TestDummy\Factory as TestDummy;

/**
 * Created by PhpStorm.
 * User: carol
 * Date: 4/18/15
 * Time: 10:15 PM
 */
class AdminBriefsTest extends TestCase {

    use DatabaseTransactions;

    /**
     * @test
     */
    public function itShowsIndexOfBriefs()
    {
        $this->seedBriefsFromMoozInc();

        $this->loginAsAValidUser();
        $this->visit('admin')
             ->andClick('Briefs')
             ->andSee('Mooz Inc')
             ->andSee('Logo')
             ->andSee('Website');


    }

    /**
     * @test
     */
    public function itCanShowABrief()
    {
        $this->seedBriefsFromMoozInc();
        $this->visit('admin/briefs')
             ->andClick('Mooz')
             ->andSee('Mooz Inc');
    }

    private function seedBriefsFromMoozInc()
    {
        $generalBrief = TestDummy::create('Dymantic\Briefs\General\GeneralBrief', ['company' => 'Mooz Inc.']);
        TestDummy::create('Dymantic\Briefs\Site\SiteBrief', ['generalbrief_id' => $generalBrief->id]);
        TestDummy::create('Dymantic\Briefs\Logo\LogoBrief', ['generalbrief_id' => $generalBrief->id]);
    }

}