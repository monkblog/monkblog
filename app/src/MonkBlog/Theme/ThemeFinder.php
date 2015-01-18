<?php namespace MonkBlog\Theme;

use Parser;
use Symfony\Component\Finder\Finder;
use Illuminate\Support\Facades\Config;

class ThemeFinder {

    /**
     *
     * @param  Finder $finder
     *
     * @return array
     */
    public static function scan( Finder $finder = null ) {

        $themes = [];
        $themesFolder = Config::get( 'theme.folder' );

        $finder = $finder ? : new Finder;

        $yml = $finder->in( $themesFolder )->files()->name( 'theme.yml' )->depth( '<= 2' )->followLinks();
        $yaml = $finder->in( $themesFolder )->files()->name( 'theme.yaml' )->depth( '<= 2' )->followLinks();

        $themeArray = array_merge( $yml, $yaml);

        foreach( $themeArray as $file ) {
            $themeInfo = Parser::yaml( $file->getContents() );
            $themes[] = $themeInfo;
        }

        return $themes;
    }
}
