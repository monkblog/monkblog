<?php namespace MonkBlog\Providers;

use App;
use MonkBlog\Core\Monk;
use Illuminate\Support\ServiceProvider;
use MonkBlog\Theme\ThemeHelper;

/**
 * Class DataServiceProvider
 *
 * @package Startribune\ServiceProviders
 */
class MonkServiceProvider extends ServiceProvider
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
        App::bind( 'monk', function () {
            $themeHelper = App::make( 'MonkBlog\Classes\ThemeHelperAbstract' );

            return new Monk( $themeHelper );
        } );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {
        return [ 'monk' ];
    }

}
