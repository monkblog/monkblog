<?php

if ( ! function_exists('theme_asset') )
{
    /**
    * Generate an asset path for the current theme.
    *
    * @param  string  $path
    * @param  bool    $secure
    * @return string
    */
    function theme_asset($path, $secure = null)
    {
        $currentTheme = Config::get( 'theme.current.name' );
        return app('url')->asset( 'theme/' . $currentTheme . $path, $secure);
    }
}