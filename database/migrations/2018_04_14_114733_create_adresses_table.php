<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->unsignedInteger('post_id');
            $table->string('street');
            $table->string('house');
            $table->unsignedInteger('city_id');

            $table->primary('post_id');
            $table->foreign('post_id','address_post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('city_id','address_city_id')->references('city_id')->on('cities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->dropForeign('address_post_id');
            $table->dropForeign('address_city_id');
        });
        Schema::dropIfExists('addresses');
    }
}
