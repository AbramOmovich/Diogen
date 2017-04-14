<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPhones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_phones',function (Blueprint $table){
           $table->increments('id');
           $table->unsignedInteger('user_id');
           $table->string('phone');

           $table->foreign('user_id', 'user_phone')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_phones',function (Blueprint $table){
            $table->dropForeign('user_phone');
        });
        Schema::dropIfExists('user_phones');
    }
}
