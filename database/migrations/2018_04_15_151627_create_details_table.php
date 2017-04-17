<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->unsignedInteger('post_id')->primary();
            $table->float('square')->unsigned()->nullable();
            $table->unsignedTinyInteger('rooms')->nullable();
            $table->unsignedTinyInteger('floor')->nullable();
            $table->unsignedTinyInteger('floor_max')->nullable();
            $table->unsignedTinyInteger('balcony')->nullable();
            $table->unsignedTinyInteger('parking')->nullable();

            $table->unsignedTinyInteger('internet')->nullable();

            $table->foreign('post_id','detail_post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('details',function (Blueprint $table){
            $table->dropForeign('detail_post_id');
        });
        Schema::dropIfExists('details');
    }
}
