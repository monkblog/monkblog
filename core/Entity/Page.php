<?php

namespace Monk\Entity;

class Page extends Document
{
    private $title;
    private $stub;

    public function setTitle($title)
    {
        $this->title = $title;
    }
}
