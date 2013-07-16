<?php

namespace Monk\Entity;

/** @Document */
class Site extends Document
{
    private $title;
    private $pages;
    private $posts;
    private $users;

    function __construct($siteTitle)
    {
        $this->title = $siteTitle;
    }
    
    public function getTitle()
    {
        return $this->title;
    }
}
