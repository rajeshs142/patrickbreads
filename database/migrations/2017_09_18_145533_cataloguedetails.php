<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cataloguedetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cataloguedetails', function(Blueprint $table) {
            $table->increments('id');
            $table->string('brand_id');
            $table->string('price');
            $table->string('image');
            $table->string('title');
            $table->string('weight')->nullable();;
            $table->string('packsize')->nullable();;
            $table->string('action_btn')->nullable();;
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
        Schema::drop('cataloguedetails');
    }
}
