<?php


class LoginTest extends TestCase
{
    /**
     * @group login
     */
    public function testLoginPage()
    {
        $this->visit('/login')
             ->see('<input class="button" type="submit" value="Login">');
    }

    /**
     * @group user
     * @group login
     */
    public function testUserLoginPage()
    {
        $this->visit('/login')
            ->fillForm('Login', [
                'email'    => 'testing@email.com',
                'password' => ENV('APP_KEY', 'password'),
            ]);
    }

    /**
     * @group user
     * @group login
     */
    public function testUserLoginPost()
    {
        $userData = [
            'email'    => 'testing@email.com',
            'password' => ENV('APP_KEY', 'password'),
        ];

        $this->route('POST', 'login.post', $userData)->isOk();
    }

    /**
     * @group user
     * @group login
     */
    public function testUserLoginFailedPost()
    {
        $userData = [
            'email'    => 'testing@email.com',
            'password' => '',
        ];

        $this->route('POST', 'login.post', $userData)->isRedirect('/login');
    }
}
