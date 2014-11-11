<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class UserGeneratorCommand extends Command {

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
	 *
	 * @return void
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
		$email = $this->ask( 'What is the email for the user?' );
		$firstName = $this->ask( 'First name?' );
		$lastName = $this->ask( 'Last name?' );
		$displayName = $this->ask( 'Display name?' );
		$password = $this->secret( 'What is the password for the user?' );

		$user = new User;

		$user->email = $email;
		$user->first_name = $firstName;
		$user->last_name = $lastName;
		$user->display_name = $displayName;
		$user->password = Hash::make( $password );

		$user->save();

		echo "User created.\n\n";
	}

}
