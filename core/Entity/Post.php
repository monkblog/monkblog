<?php

namespace Monk\Entity;

/** @Document */
class Post extends Document
{
    private $title;
    private $stub;
    private $content;

    public function getStub()
    {
        return $this->stub;
    }
}
