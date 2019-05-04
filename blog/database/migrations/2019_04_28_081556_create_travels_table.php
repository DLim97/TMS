<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTravelsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Travel_Name');
            $table->integer('RoomType_ID')->unsigned();
            $table->date('Start_date');
            $table->date('End_date');
            $table->float('Price');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('RoomType_ID')->references('id')->on('room_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('travels');
    }
}
