<?php

use Laracasts\TestDummy\Factory as TestDummy;

/**
 * Created by PhpStorm.
 * User: user
 * Date: 4/11/2015
 * Time: 11:57 AM
 */
class AuthTest extends TestCase {

    /**
     * @test
     */
    public function itAllowsUsersToLogin()
    {
        $this->loginAsAValidUser(['email' => 'joe@example.com']);
        $this->seePageIs('admin');
    }

    /**
     * @test
     */
    public function itAllowsUsersToLogout()
    {
        //i am logged in
        $this->loginAsAValidUser(['email' => 'joe@example.com']);
        //i visit the logout link
        $this->visit('admin/logout');
        //i am logged out
        $this->visit('admin')->andSeePageIs('admin/login');

    }



}