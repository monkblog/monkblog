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

    public function testUserLoginPage()
    {
        $this->visit('/login')
            ->fillForm('Login', [
                'email' => 'testing@email.com',
                'password' => ENV( 'APP_KEY', 'password' ),
            ]);
    }

    public function testUserLoginPost() {
        $userData = [
            'email' => 'testing@email.com',
            'password' => ENV( 'APP_KEY', 'password' ),
        ];

        $this->call( 'POST', '/login', $userData )->isOk();
    }

    public function testUserLoginFailedPost() {
        $userData = [
            'email' => 'testing@email.com',
            'password' => '',
        ];

        $this->call( 'POST', '/login', $userData )->isRedirect( '/login' );
    }

}
