<?php namespace MonkBlog\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class DataServiceProvider
 *
 * @package Startribune\ServiceProviders
 */
class AppServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {
        return [ ];
    }

}
