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

            $table->tinyInteger('has_projector');
            $table->tinyInteger('has_dashboard');
            $table->tinyInteger('has_handicapped');
            $table->tinyInteger('is_active');
            // $table->tinyInteger('is_delete');
            $table->tinyInteger('is_ready');
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
