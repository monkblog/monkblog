<?php

use Illuminate\Database\Seeder;
use MonkBlog\Models\User;

class TestUserSeeder extends Seeder
{
    public function run()
    {
        $userData = [];
        $userData['email'] = 'testing@email.com';
        $userData['first_name'] = 'Test';
        $userData['last_name'] = 'User';
        $userData['display_name'] = 'test_user';
        $userData['password'] = Hash::make(ENV('APP_KEY', 'password'));
        $userData['owner'] = true;

        User::create($userData);
    }
}
