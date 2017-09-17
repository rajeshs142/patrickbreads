<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Carousel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carousel', function(Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->string('heading');
            $table->string('description')->nullable();;
            $table->string('action_btn')->nullable();;
            $table->string('link')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('carousel');
    }
}
