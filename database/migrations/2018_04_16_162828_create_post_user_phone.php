<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostUserPhone extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_user_phone',function (Blueprint $table){
            $table->unsignedInteger('post_id');
            $table->unsignedInteger('user_phone_id');

            $table->unique(['post_id','user_phone_id']);
            $table->foreign('post_id', 'post_user_phone_post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('user_phone_id', 'post_user_phone_user_phone_id')->references('id')->on('user_phones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_user_phone',function (Blueprint $table){
            $table->dropForeign('post_user_phone_post_id');
            $table->dropForeign('post_user_phone_user_phone_id');
        });
        Schema::dropIfExists('post_user_phone');
    }
}
