<?php

namespace Monk\Service;

use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;

class DataStore extends MonkService
{
    private $config;

    function __construct($parameters)
    {
        AnnotationDriver::registerAnnotationClasses();
       
        $config = new Configuration();
         
    }
}
