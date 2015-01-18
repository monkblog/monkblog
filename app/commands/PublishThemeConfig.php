<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class PublishThemeConfig extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'monk:set-theme';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set theme.php in your env config theme.';

    /**
     * Create a new command instance.
     *
     */
    public function __construct() {
        parent::__construct();

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire() {
        $config = '<?php
return [
	"current" => [
		"id" => "{id}",
		"name" => "{name}",
	]
];';
        $error = false;
        $theme = '';
        $themeId = '';
        $themeName = '';

        $name = $this->argument( 'theme' );

        $id = $this->option( 'id' );

        if( empty( $name ) && !empty( $id ) ) {
            $theme = Theme::find( $id );
            if( !empty( $theme ) ) {
                $themeName = $theme->name;
                $themeId = $theme->id;
            } else {
                $this->error( "Can't find Theme with id of " . $id );
                $error = true;
            }
        }

        if( !empty( $name ) && empty( $theme ) ) {
            $theme = Theme::where( 'name', '=', $name )->get()->first();
            if( !empty( $theme ) ) {
                $themeName = $theme->name;
                $themeId = $theme->id;
            } else {
                $this->error( "Can't find Theme with name of " . $name );
                $error = true;
            }
        }

        if( !$error && !empty( $themeId ) && !empty( $themeName ) ) {

            $config = str_replace( '{id}', $themeId, $config );
            $config = str_replace( '{name}', $themeName, $config );

            $configPath = app_path( 'config/' . App::environment() . '/theme.php' );

            $bytes_written = File::put( $configPath, $config );

            if( $bytes_written === false ) {
                $this->error( 'File failed to write to ' . $configPath );
            } else {
                $this->info( 'Theme set as ' . $themeName . ' in ' . $configPath );
            }
        }

    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments() {
        return [
            [ 'theme', InputArgument::OPTIONAL, 'The Theme model name' ],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions() {
        return [
            [ 'id', null, InputOption::VALUE_OPTIONAL, "The Theme model id", null ],
        ];
    }

}
