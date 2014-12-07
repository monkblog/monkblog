<?php

class RouteTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testHomeWorks()
	{
		$crawler = $this->client->request('GET', '/');

		$this->assertTrue( $this->client->getResponse()->isOk() );
	}

}
