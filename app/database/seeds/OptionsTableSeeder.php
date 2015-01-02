<?php

class OptionsTableSeeder extends Seeder {

    public function run()
    {
        $optionTabs = Config::get( 'option_tabs' , [] );

        foreach( $optionTabs as $tab ) {
            $checkOptionTab = DB::table( 'option_tabs' )->where( 'slug', $tab[ 'slug' ] )->get();

            if( empty( $checkOptionTab ) ) {
                $optionTab = new OptionTab;
                $optionTab->slug = $tab[ 'slug' ];
                $optionTab->display_name = ucwords( str_replace( '_', ' ', $tab[ 'slug' ] ) );

                $optionTab->save();

                foreach( $tab[ 'options' ] as $name => $value ) {
                    $checkOption = DB::table( 'options' )->where( 'name', $name )->get();

                    if( empty( $checkOption ) && !empty( $value ) ) {
                        $option = new Option;
                        $option->name = $name;
                        $option->display_name = ucwords( str_replace( '_', ' ', $name ) );
                        $option->value = $value;
                        $option->autoload = true;
                        $option->sort_order = 1;

                        $optionTab->options()->save( $option );
                    }
                }
            }
        }
    }

}