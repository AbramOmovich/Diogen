<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('text');
            $table->unsignedInteger('post_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id','comment_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('post_id','comment_post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table){
            $table->dropForeign('comment_post_id');
            $table->dropForeign('comment_user_id');
        });
        Schema::dropIfExists('comments');
    }
}
