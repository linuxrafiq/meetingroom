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
            $table->integer('capacity');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('feature_image')->nullable();
            $table->string('featured_image_title')->nullable();

            $table->tinyInteger('projector');
            $table->tinyInteger('dashboard');
            $table->tinyInteger('handicapped');
            $table->tinyInteger('active');
            // $table->tinyInteger('is_delete');
            $table->tinyInteger('ready');
            $table->bigInteger('category')->unsigned();
            $table->timestamps();
            $table->tinyInteger('deleted')->default(0);
            $table->foreign('category')->references('id')->on('room_categories');

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
