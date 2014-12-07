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
	 * @return \UserGeneratorCommand
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
		$userData[ 'email' ] = $this->ask( 'What is the email for the user?' );
		$userData[ 'first_name' ] = $this->ask( 'First name?' );
		$userData[ 'last_name' ] = $this->ask( 'Last name?' );
		$userData[ 'display_name' ] = $this->ask( 'Display name?' );
		$userData[ 'password' ] = $this->secret( 'What is the password for the user?' );
		$userData[ 'password_confirmation' ] = $this->secret( 'Confirm password' );

		$validator = Validator::make( $userData, User::$rules );

		if( $validator->fails() ) {
			$this->error( $validator->errors()->first() );
			$this->info( 'Trying running ' . $this->name . ' again.');
		}
		else {
			$userData[ 'password' ] = Hash::make( $userData[ 'password' ] );
			User::create( $userData );

			$this->info( "User created." );
		}
	}

}
