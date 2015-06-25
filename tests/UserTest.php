<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use MonkBlog\Models\User;

class UserTest extends TestCase
{
    use DatabaseTransactions;

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

    public function userData( Array $override = [] ) {
        $userData = [];
        $userData[ 'email' ] = 'testing@email.com';
        $userData[ 'first_name' ] = 'User';
        $userData[ 'last_name' ] = 'Test';
        $userData[ 'display_name' ] = 'test_user';
        $userData[ 'password' ] = Hash::make( ENV( 'APP_KEY', 'password' ) );
        $userData[ 'owner' ] = true;

        if( !empty( $override ) ) {
            foreach( $override as $key => $value ) {
                $userData[ $key ] = $value;
            }
        }

        return $userData;
    }

    /**
     * @group user
     * @group login
     */
    public function testLoginRedirectToAdminDashboard()
    {
        $this->actingAs($this->getTestUser())
            ->withSession(['foo' => 'bar'])
            ->visit('/login')
            ->see('Dashboard');
    }


    public function testLogout()
    {
        $this->actingAs($this->getTestUser())
            ->withSession(['foo' => 'bar'])
            ->visit('/admin')
            ->click('Logout')
            ->visit('/login')
            ->see('<input class="button" type="submit" value="Login">');
    }

    /**
     * @group user
     * @group update
     */
    public function testUpdateUser() {
        $user = $this->getTestUser();

        $this->assertEquals( 'Test', $user->first_name );

        $userData = $this->userData( [
            'first_name' => 'User',
            'last_name' => 'Test',
        ]);

        $user->update( $userData );

        $this->assertEquals( 'User', $user->first_name );
    }
}
