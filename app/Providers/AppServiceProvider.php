<?php

namespace MonkBlog\Providers;

use Auth;
use Config;
use View;
use MonkBlog\Models\Option;
use MonkBlog\Models\Page;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $currentTheme = current_theme();
        View::addNamespace( $currentTheme, base_path("themes/{$currentTheme}/" ) );
        View::addNamespace( 'admin', base_path( 'resources/admin/' ) );

        // Shared variables
        $pageList = [ ];
        $siteTitle = Config::get( 'site.title', '' );
        $siteVersion = Config::get( 'site.version', '' );
        $tagline = Config::get( 'site.tagline', '' );
        $contactEmail = Config::get( 'site_contact.email' );
        $contactFacebook = Config::get( 'site_contact.facebook' );
        $contactTwitter = Config::get( 'site_contact.twitter' );

        if( php_sapi_name() != 'cli' ) {
            $pageList = Page::where( 'is_published', '=', true )->get();

            $siteTitle = Option::where( 'name', '=', 'site_title' )->get()->first();
            $siteVersion = Option::where( 'name', '=', 'monk_version' )->get()->first();
            $tagline = Option::where( 'name', '=', 'tagline' )->get()->first();

            $contactEmail = Option::where( 'name', '=', 'email' )->get()->first();
            $contactFacebook = Option::where( 'name', '=', 'facebook' )->get()->first();
            $contactTwitter = Option::where( 'name', '=', 'twitter' )->get()->first();
        }

        View::share( 'siteTitle', $siteTitle );
        View::share( 'monkVersion', $siteVersion );
        View::share( 'tagline', $tagline );
        View::share( 'contactEmail', $contactEmail );
        View::share( 'contactFacebook', $contactFacebook );
        View::share( 'contactTwitter', $contactTwitter );
        View::share( 'pageList', $pageList );
        View::share( 'dateFormat', 'l, M jS @ g:ia' );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
