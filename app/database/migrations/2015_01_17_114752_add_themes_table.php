<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddThemesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('themes', function(Blueprint $table)
		{
			$table->increments( 'id' );
			$table->string( 'name' )->unique();
			$table->string( 'display_name' );
			$table->text( 'uri' );
			$table->text( 'description' );
			$table->integer( 'version' );
			$table->text( 'preview' );
			$table->text( 'license' );
			$table->text( 'author' );
			$table->text( 'author_uri' );
			$table->text( 'author_email' );
			$table->text( 'domain_path' );
			$table->text( 'assets' );
			$table->text( 'assets_folder' );
			$table->text( 'template_type' );
			$table->text( 'template_folder' );
			$table->text( 'template_namespace' );
			$table->text( 'tags' );
			$table->text( 'meta_data' );
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
		Schema::table('themes', function(Blueprint $table)
		{
			Schema::drop( 'themes' );
		});
	}

}
