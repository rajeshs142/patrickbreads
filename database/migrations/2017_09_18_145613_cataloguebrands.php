<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cataloguebrands extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cataloguebrands', function(Blueprint $table) {
            $table->increments('id');
            $table->string('banner')->nullable();;
            $table->string('logo');
            $table->string('email')->nullable();;
            $table->string('phone_number')->nullable();;
            $table->string('website')->nullable();;
            $table->string('background_image')->nullable();;
            $table->string('background_color')->nullable();;
            $table->string('footertext1')->nullable();;
            $table->string('footertext2')->nullable();;
            $table->string('no_of_products')->nullable();;
            $table->string('cobrand_logo')->nullable();;
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
        Schema::drop('cataloguebrands');
    }
}
