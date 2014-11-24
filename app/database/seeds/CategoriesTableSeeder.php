<?php

class CategoriesTableSeeder extends Seeder {

    public function run() {
        Eloquent::unguard();
        $uncategorized = DB::table( 'categories' )->where( 'slug', 'uncategorized' );

        if( count( DB::table('categories')->get() ) == 0 && empty( $uncategorized ) ) {
            Category::create( [
                'title' => 'Uncategorized',
                'description' => 'Default category',
                'slug' => 'uncategorized',
            ] );
        }
    }

}