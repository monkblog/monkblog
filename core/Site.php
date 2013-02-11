<?php

class Site
{
    private $title;

    function __construct($siteTitle)
    {
        $this->title = $siteTitle;
    }
    
    public function getTitle()
    {
        return $this->title;
    }
}