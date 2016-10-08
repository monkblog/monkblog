<?php

namespace MonkBlog\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use MonkBlog\Models\User;

class UserGeneratorCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'user:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a user.';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $userData = [];
        $userData['email'] = $this->ask('What is the email for the user?');
        $userData['first_name'] = $this->ask('First name?');
        $userData['last_name'] = $this->ask('Last name?');
        $userData['display_name'] = $this->ask('Display name?');
        $userData['password'] = $this->secret('What is the password for the user?');
        $userData['password_confirmation'] = $this->secret('Confirm password');

        $validator = Validator::make($userData, User::$rules);

        if ($validator->fails()) {
            $messages = $validator->errors()->getMessages();
            foreach ($messages as $message) {
                if (isset($message[0])) {
                    $this->error($message[0]);
                    echo "\n";
                }
            }
            $this->info('Try running '.$this->name.' again.');
        } else {
            if (count(User::all()) == 0) {
                $userData['owner'] = true;
            }
            $userData['password'] = Hash::make($userData['password']);
            User::create($userData);

            $this->info('User created.');
        }
    }
}
