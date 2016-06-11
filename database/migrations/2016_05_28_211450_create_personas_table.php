<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cash')->nullable();
            $table->integer('curCarIndex')->nullable();
            $table->integer('iconIndex')->nullable();
            $table->integer('level')->nullable();
            $table->string('motto', 255)->nullable();
            $table->string('name', 50)->nullable();
            $table->float('percentToLevel')->nullable();
            $table->float('rating')->nullable();
            $table->float('rep')->nullable();
            $table->float('repAtCurrentLevel')->nullable();
            $table->float('score')->nullable();
            $table->bigInteger('userId')->nullable();
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
        Schema::drop('personas');
    }
}
