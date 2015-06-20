<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Eloquent::unguard();

        $this->command->info( 'Seeding default category' );
        $this->call('CategoriesTableSeeder');

        $this->command->info( 'Seeding options from configs' );
        $this->call('OptionsTableSeeder');

    }

}
