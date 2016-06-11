<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bundleItems')->nullable();
            $table->string('categoryId')->nullable();
            $table->string('categoryName')->nullable();
            $table->string('currency')->nullable();
            $table->string('description')->nullable();
            $table->integer('durationMinute');
            $table->bigInteger('hash');
            $table->string('icon')->nullable();
            $table->integer('level');
            $table->string('longDescription')->nullable();
            $table->float('price');
            $table->integer('priority');
            $table->string('productId')->nullable();
            $table->string('productTitle')->nullable();
            $table->string('productType')->nullable();
            $table->string('secondaryIcon')->nullable();
            $table->integer('useCount');
            $table->string('visualStyle')->nullable();
            $table->string('webIcon')->nullable();
            $table->string('webLocation')->nullable();
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
        Schema::drop('products');
    }
}
