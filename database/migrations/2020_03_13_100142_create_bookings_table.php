<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_date');
            $table->text('description')->nullable();
            $table->bigInteger('user')->unsigned();
            $table->bigInteger('room')->unsigned();
            $table->bigInteger('client')->unsigned();
            $table->bigInteger('category')->unsigned();

            $table->timestamps();
            $table->tinyInteger('deleted')->default(0);
            $table->foreign('user')->references('id')->on('users');
            $table->foreign('room')->references('id')->on('rooms');
            $table->foreign('client')->references('id')->on('clients');
            $table->foreign('category')->references('id')->on('booking_categories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
