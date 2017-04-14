<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->unsignedBigInteger('price');
            $table->unsignedInteger('currency_id');
            $table->text('photo');
            $table->unsignedInteger('type_id');
            $table->timestamps();
            $table->unsignedInteger('user_id');

            $table->foreign('user_id', 'post_of_user')->references('id')->on('users');
            $table->foreign('type_id','type')->references('id')->on('post_types');
            $table->foreign('currency_id', 'id_of_currency')->references('id')->on('currencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts',function (Blueprint $table){
            $table->dropForeign('type');
            $table->dropForeign('post_of_user');
            $table->dropForeign('id_of_currency');
        });
        Schema::dropIfExists('posts');
    }
}
