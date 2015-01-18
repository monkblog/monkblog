<?php namespace MonkBlog\Facade;

use Illuminate\Support\Facades\Facade;

class Monk extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
        return 'monk';
    }

}
