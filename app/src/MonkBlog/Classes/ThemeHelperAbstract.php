<?php namespace MonkBlog\Classes;

use Config;
use Parser;
use Str;
use Theme;

abstract class ThemeHelperAbstract {

    /**
     * @var string
     */
    public $themesFolder;

    public function __construct($themeFolder = 'themes') {
        $this->themesFolder = base_path($themeFolder) ;
    }

    public function scan() {

    }

    public function find($themeName) {

    }

    public function createIndexFile() {

    }

    public function all() {

    }

    /**
     * @return bool|Theme
     */
    public function current() {
        if( Config::has( 'theme.current.name' ) && $name = Config::get( 'theme.current.name' ) && php_sapi_name() != 'cli' ) {
            $theme = Theme::where( 'name', '=',  $name )->get()->first();
            if( !empty( $theme ) ) {
                return $theme;
            }
        }
        return false;
    }

    /**
     * @param $assetsFolder
     * @param $name
     *
     * @return string
     */
    public function createRelateAssetUrl($assetsFolder, $name) {
        return trim( $assetsFolder , '/' ) . '/' .  trim( $name, '/' );
    }

    /**
     * @param string $name
     *
     * @return bool|string
     */
    public function invalidFolderName( $name ) {
        if( $name !== Str::slug( $name ) ) {
            return Str::slug( $name );
        }
        return false;
    }

    /**
     * @param $name
     * @param string $changeTo
     *
     * @return bool
     */
    public function renameFolder( $name, $changeTo = '' ) {
        if( !empty( $changeTo ) ) {
            //rename, if fail false
            return true;
        }
        $validFolder = Str::slug( $name );
        //rename, if fail false
        return true;
    }

    /**
     * @param $yml
     *
     * @return array
     */
    public function processYml($yml) {
        $array = Parser::yaml( $yml );
        return $this->processArray( $array );
    }

    /**
     * @param array $array
     *
     * @return array
     */
    public function processArray(Array $array) {
        $themeData = [];
        foreach( $array as $key => $value ) {
            if( $key == 'assets_folder' && array_key_exists( 'name', $array ) ) {
                $themeData[ $key ] = $this->createRelateAssetUrl( $value, $array[ 'name' ] );
            }
            else {
                $themeData[ $key ] = $value;
            }
        }
        return $themeData;
    }
}