<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use MonkBlog\Models\User;

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

    public function testAdminPage() {
        $user = User::find( 1 );

        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('/login')
            ->see('Dashboard');
    }
}
