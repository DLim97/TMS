<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoomTypesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('RoomType_Name');
            $table->integer('Hotel_ID')->unsigned();
            $table->float('Price');
            $table->text('Description');
            $table->string('RoomType_IMG');
            $table->integer('NBeds');
            $table->string('Bed_Size');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('Hotel_ID')->references('id')->on('hotels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('room_types');
    }
}
