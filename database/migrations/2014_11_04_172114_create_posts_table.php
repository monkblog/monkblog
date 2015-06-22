<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'posts', function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->string( 'title' );
            $table->string( 'slug' )->unique();
            $table->string( 'body' );
            $table->string( 'summary' );
            $table->integer( 'category_id' )->unsigned();
            $table->foreign( 'category_id' )->references( 'id' )->on( 'categories' );
            $table->boolean( 'is_published' );
            $table->timestamp( 'published_at' )->index();
            $table->timestamps();
        } );
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop( 'posts' );
    }

}
