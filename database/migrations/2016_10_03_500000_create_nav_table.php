<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // create navigation table
        Schema::create('nav', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('nav_slug');
            $table->string('link');
            $table->string('order');
            $table->string('direction')->default('left');
            $table->integer('parent_id')->nullable();
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
        // drop navigation table
        Schema::drop('nav');
    }
}
