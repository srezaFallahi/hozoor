<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDayRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day_room', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('day_id')->unsigned();
            $table->unsignedBigInteger('room_id')->unsigned();
            $table->timestamps();

            $table->foreign('day_id')->references('id')->on('days')->onDelete('cascade');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('day_room');
    }
}
