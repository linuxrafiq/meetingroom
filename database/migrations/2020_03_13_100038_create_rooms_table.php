<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('capacity');
            $table->text('description');
            $table->tinyInteger('has_projector');
            $table->tinyInteger('has_dashboard');
            $table->tinyInteger('has_handicapped');
            $table->tinyInteger('is_active');
            $table->tinyInteger('is_delete');
            $table->tinyInteger('is_ready');
            $table->bigInteger('room_cat_id')->unsigned();
            $table->timestamps();
            $table->foreign('room_cat_id')->references('id')->on('room_categories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
