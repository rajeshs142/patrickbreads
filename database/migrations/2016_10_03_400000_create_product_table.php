<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('product_slug')->nullable();
            $table->longText('description')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('ingredients')->nullable();
            $table->integer('category_id')->nullable()->unsigned();
            $table->integer('sub_category_id')->nullable()->unsigned();
            $table->integer('sub_category2_id')->nullable()->unsigned();
            $table->integer('manufacturer_id')->nullable()->unsigned();
            $table->integer('created_by')->nullable()->unsigned();
            $table->string('image_url')->nullable();
            $table->string('thumb_url')->nullable();
            $table->string('code')->nullable();
            $table->string('color')->nullable();
            $table->string('texture')->nullable();
            $table->string('size')->nullable();
            $table->string('pack_size')->nullable();
            $table->string('unit_weight')->nullable();
            $table->string('case_weight')->nullable();
            $table->string('shelf_life')->nullable();
            $table->string('storage')->nullable();
            $table->string('energy')->nullable();
            $table->string('allergens')->nullable();
            $table->string('tags')->nullable();
            $table->timestamps();
        });
        
        Schema::table('product', function(Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('category');
            $table->foreign('sub_category_id')->references('id')->on('category');
            $table->foreign('sub_category2_id')->references('id')->on('category');
            $table->foreign('manufacturer_id')->references('id')->on('manufacturer');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product');
    }
}
