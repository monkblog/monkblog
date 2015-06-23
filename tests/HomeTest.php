<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeTest extends TestCase
{
    /**
     * @group home
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('Nothing to see here yet.');
    }
}
