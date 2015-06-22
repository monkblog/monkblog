<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use MonkBlog\Models\User;

class UserTest extends TestCase
{

    /**
     * @var MonkBlog\Models\User
     */
    protected static $user;

    public function getTestUser()
    {
        if( self::$user instanceof User ) {
            return self::$user;
        }
        return self::$user = User::find( 1 );
    }

    public function testLoginRedirectToAdminDashboard()
    {
        $this->actingAs($this->getTestUser())
            ->withSession(['foo' => 'bar'])
            ->visit('/login')
            ->see('Dashboard');
    }
}
