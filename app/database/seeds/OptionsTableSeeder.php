<?php

class OptionsTableSeeder extends Seeder {

    public function run()
    {
        $seedArray = [
            'site_title' => Config::get( 'site.title', '' ),
            'monk_version' => Config::get( 'site.version', '' ),
            'tagline' => Config::get( 'site.tagline', '' ),
        ];
        foreach( $seedArray as $name => $value ) {
            $checkOption = DB::table( 'options' )->where( 'name', $name )->get();
            if( empty( $checkOption ) && !empty( $value ) ) {
                Option::create( [
                    'name' => $name,
                    'value' => $value,
                    'autoload' => true,
                ] );
            }
        }
    }

}