<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('city_id');
            $table->unsignedInteger('region_id');
            $table->string('name');

            $table->foreign('region_id','city_region_id')->references('region_id')->on('regions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cities',function (Blueprint $table){
            $table->dropForeign('city_region_id');
        });
        Schema::dropIfExists('cities');
    }
}
