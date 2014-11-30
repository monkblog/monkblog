<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $this->command->info( 'Seeding default category' );
        $this->call('CategoriesTableSeeder');

    }

}
