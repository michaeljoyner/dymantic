<?php
use Laracasts\Integrated\Services\Laravel\DatabaseTransactions;

/**
 * Created by PhpStorm.
 * User: user
 * Date: 4/11/2015
 * Time: 1:53 PM
 */
class RegistrationTest extends TestCase {

    use DatabaseTransactions;

    /**
     * @test
     */
    public function itRegistersNewUsers()
    {
        $newUser = [
            'name'                  => 'Michael Joyner',
            'email'                 => 'joyner.michael@gmail.com',
            'password'              => 'password',
            'password_confirmation' => 'password'
        ];
        $this->loginAsAValidUser(['email' => 'joe@example.com']);
        $this->click('Users')
             ->andSeePageIs('admin/users')
             ->andClick('Create')
             ->andSeePageIs('admin/users/create');
        $this->submitForm('Register', $newUser);
        $this->verifyInDatabase('users', ['email' => 'joyner.michael@gmail.com']);
    }

}