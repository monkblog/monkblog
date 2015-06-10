<?php namespace MonkBlog\Providers;

class Installer
{
    protected $databaseExists;
    protected $userExists;

    function __construct() {
        $this->databaseExists = false;
        $this->userExists = false;

        $this->getState();
    }

    protected function getState()
    {
        $installFile = include( app_path() . 'install.php' );

        if ( !$installFile ) {
            return false;
        }

        $this->databaseExists = $installFile[ 'database_exists' ];
        $this->userExists = $installFile[ 'user_exists' ];
    }

    public function getDatabaseExists()
    {
        return $this->databaseExists;
    }

    public function getUserExists()
    {
        return $this->userExists;
    }

    public function checkInstallComplete()
    {
        if ( $this->databaseExists && $this->userExists ) {
            return true;
        }

        return false;
    }
}
