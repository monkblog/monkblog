<?php namespace MonkBlog\Facade;

use Illuminate\Support\Facades\Facade;

class Installer extends Facade
{
    protected static function getFacadeAccessor() {
        return 'installer'; 
    }
}
