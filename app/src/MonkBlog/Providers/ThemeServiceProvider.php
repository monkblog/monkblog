<?php namespace MonkBlog\Providers;

use App;
use MonkBlog\Theme\ThemeHelper;
use Illuminate\Support\ServiceProvider;

/**
 * Class DataServiceProvider
 *
 * @package Startribune\ServiceProviders
 */
class ThemeServiceProvider extends ServiceProvider
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
        App::bind( 'MonkBlog\Classes\ThemeHelperAbstract', function() {
            return new ThemeHelper();
        });
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
