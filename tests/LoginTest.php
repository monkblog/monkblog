<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testLoginPage()
    {
        $this->visit('/login')
             ->see('<input class="button" type="submit" value="Login">');
    }

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testUserLoginPage()
    {
        $this->visit('/login')
            ->fillForm('Login', [
                'email' => 'testing@email.com',
                'password' => ENV( 'APP_KEY', 'password' ),
            ]);

        $this->visit('/login')->see('Dashboard');
    }
}
