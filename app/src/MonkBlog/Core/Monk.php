<?php namespace MonkBlog\Core;

use View;
use MonkBlog\Classes\ThemeHelperAbstract;

class Monk {

    /**
     * @var \MonkBlog\Classes\ThemeHelperAbstract
     */
    protected $themeHelper;

    public function __construct( ThemeHelperAbstract $themeHelper ) {
        if( $theme = $themeHelper->current() ) {
            View::addNamespace( $theme->name, $theme->views );
        }
        $this->themeHelper = $themeHelper;
    }


    /**
     * @return \MonkBlog\Classes\ThemeHelperAbstract
     */
    public function theme() {
        return $this->themeHelper;
    }
}