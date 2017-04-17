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
            $table->text('description');
            $table->unsignedBigInteger('price');
            $table->unsignedInteger('currency_id');
            $table->text('photo');
            $table->timestamps();
            $table->unsignedInteger('type_id');
            $table->unsignedInteger('dwelling_type_id');
            $table->unsignedInteger('user_id');

            $table->foreign('type_id','type')->references('id')->on('post_types')->onDelete('cascade');
            $table->foreign('user_id', 'post_of_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('dwelling_type_id','post_dwelling_type')->references('dwelling_id')->on('dwelling_types')->onDelete('cascade');
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
            $table->dropForeign('post_dwelling_type');
            $table->dropForeign('post_of_user');
            $table->dropForeign('id_of_currency');
        });
        Schema::dropIfExists('posts');
    }
}
