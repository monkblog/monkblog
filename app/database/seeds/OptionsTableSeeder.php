<?php

class OptionsTableSeeder extends Seeder {

    public function run()
    {
        $optionTabs = Config::get( 'option_tabs' , [] );

        foreach( $optionTabs as $tab ) {
            $optionTab = OptionTab::where( 'slug', $tab[ 'slug' ] )->get()->first();

            if( empty( $optionTab ) ) {
                $optionTab = new OptionTab;
                $optionTab->slug = $tab[ 'slug' ];
                $optionTab->display_name = ucwords( str_replace( '_', ' ', $tab[ 'slug' ] ) );

                $optionTab->save();
            }

            foreach( $tab[ 'options' ] as $name => $value ) {
                $checkOption = Option::where( 'name', $name )->get()->first();

                if( empty( $checkOption ) && !empty( $value ) && $tab[ 'slug' ] != 'themes' ) {
                    $option = new Option;
                    $option->name = $name;
                    $option->display_name = ucwords( str_replace( '_', ' ', $name ) );
                    $option->value = $value;
                    $option->autoload = true;
                    $option->sort_order = 1;

                    $optionTab->options()->save( $option );
                }
                else if( $tab[ 'slug' ] == 'themes' ) {
                    if( $name == Config::get( 'theme.demo_name' ) && !Config::get( 'theme.demo_exist' ) )
                        continue;

                    $checkTheme = Option::where( 'name', $value[ 'name' ] )->get()->first();

                    if(empty($checkTheme) && is_array( $value ) ) {

                        $validator = Validator::make( $value, Theme::$rules );
                        if( $validator->passes() ) {
                            foreach( $value as $themeKey => $themeValue ) {

                            }
                            $theme = new Theme;
                            $theme->name = $value[ 'name' ];
                            $theme->display_name = $value[ 'display' ];
                        }
                    }
                }
            }
        }
    }

}