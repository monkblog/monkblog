<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder {

    public function run() {
        $uncategorized =  DB::table( 'categories' )->where( 'slug', 'uncategorized' )->get();

        if( count( DB::table( 'categories' )->get() ) == 0 && empty( $uncategorized ) ) {
            Category::create( [
                'title' => 'Uncategorized',
                'description' => 'Default category',
                'slug' => 'uncategorized',
            ] );
        }
    }

}