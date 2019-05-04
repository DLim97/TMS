<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('User_ID')->unsigned();
            $table->integer('Travel_ID')->unsigned();
            $table->integer('RoomType_ID')->unsigned();
            $table->date('Start_date');
            $table->date('End_date');
            $table->float('Price');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('User_ID')->references('id')->on('users');
            $table->foreign('Travel_ID')->references('id')->on('travels');
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
        Schema::drop('orders');
    }
}
