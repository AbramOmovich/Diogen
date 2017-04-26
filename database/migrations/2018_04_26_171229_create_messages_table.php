<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('post_id');
            $table->text('comment')->nullable();
            $table->unsignedInteger('from')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->unsignedInteger('to_user');
            $table->unsignedTinyInteger('watched')->default(0);
            $table->timestamps();

            $table->foreign('post_id','message_post_id')->references('id')->on('posts');
            $table->foreign('from','message_from_id')->references('id')->on('users');
            $table->foreign('to_user','message_to_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages',function (Blueprint $table){
            $table->dropForeign('message_from_id');
            $table->dropForeign('message_to_user_id');
        });
        Schema::dropIfExists('messages');
    }
}
