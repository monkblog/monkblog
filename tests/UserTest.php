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
    protected $user;

    public function setUp()
    {
        $this->user = User::find( 1 );
    }

    public function testAdminPage()
    {
        $this->actingAs($this->user)
            ->withSession(['foo' => 'bar'])
            ->visit('/login')
            ->see('Dashboard');
    }
}
