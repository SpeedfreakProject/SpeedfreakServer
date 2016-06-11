<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnedCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owned_cars', function (Blueprint $table) {
            $table->smallInteger('durability')->nullable();
            $table->smallInteger('heatLevel')->nullable();
            $table->string('expirationDate')->nullable();
            $table->bigInteger('uniqueCarId');
            $table->bigInteger('personaId')->nullable();
            $table->string('ownershipType')->nullable();
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
        Schema::drop('owned_cars');
    }
}
