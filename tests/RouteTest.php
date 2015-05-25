<?php

class RouteTest extends TestCase {

	public function testHomeWorks()
	{
		$this->call( 'GET', '/' );

		$this->assertResponseOk();
	}

	public function testAdminIsFirewalled()
	{

		$this->call( 'GET', '/admin' );

		$this->assertRedirectedToRoute( 'login' );
	}

	public function testAdminLetsInAuthenticatedUser()
	{

		$user = new User( [ 'email' => 'user@example.com' ] );

		$this->be( $user );

		$this->call( 'GET', '/admin' );

		$this->assertResponseStatus( 200 );
	}

}
