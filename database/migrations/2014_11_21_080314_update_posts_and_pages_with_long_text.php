<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class UpdatePostsAndPagesWithLongText extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            DB::statement('ALTER TABLE posts MODIFY COLUMN body TEXT');
        });

        Schema::table('pages', function (Blueprint $table) {
            DB::statement('ALTER TABLE pages MODIFY COLUMN body TEXT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            DB::statement('ALTER TABLE posts MODIFY COLUMN body VARCHAR(255)');
        });

        Schema::table('pages', function (Blueprint $table) {
            DB::statement('ALTER TABLE pages MODIFY COLUMN body VARCHAR(255)');
        });
    }
}
