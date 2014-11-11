<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create( 'pages', function( Blueprint $table )
		{
			$table->increments( 'id' );
			$table->string( 'title' );
			$table->string( 'description' );
			$table->string( 'body' );
			$table->string( 'slug' )->unique();
			$table->boolean( 'is_published' );
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
		Schema::drop( 'pages' );
	}

}
