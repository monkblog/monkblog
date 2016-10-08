<?php


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
