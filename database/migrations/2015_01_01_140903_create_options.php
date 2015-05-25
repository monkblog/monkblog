<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateOptions extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('option_tabs', function(Blueprint $table)
		{
			$table->increments( 'id' );
			$table->string( 'display_name' );
			$table->string( 'slug' )->unique();
			$table->timestamps();
		});

		Schema::create('options', function(Blueprint $table)
		{
			$table->increments( 'id' );
			$table->string( 'display_name' );
			$table->string( 'name' )->unique();
			$table->string( 'value' );
			$table->boolean( 'autoload' );
			$table->integer( 'sort_order' )->unsigned()->default(1);
			$table->integer( 'option_tab_id' )->unsigned();
			$table->index( 'option_tab_id' );
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop( 'option_tabs' );
		Schema::drop( 'options' );
	}

}
