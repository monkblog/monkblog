<?php namespace MonkBlog\Providers;

use Illuminate\Support\ServiceProvider;

class InstallerServiceProvider extends ServiceProvider
{
    protected $defer = false;

    public function register() {
        $this->app->bind( 'installer', function()
        {
            return new MonkBlog\Providers\Installer;
        });
    }

    public function provides() {
        return [];
    }
}
