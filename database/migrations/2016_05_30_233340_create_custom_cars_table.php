<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_cars', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('baseCarId')->nullable();
            $table->integer('carClassHash')->nullable();
            $table->boolean('isPreset')->nullable();
            $table->integer('level')->nullable();
            $table->string('name')->nullable();
            $table->bigInteger('apiId')->nullable();
            $table->string('paints', 1500)->nullable();
            $table->string('performanceParts', 1000)->nullable();
            $table->bigInteger('physicsProfileHash')->nullable();
            $table->integer('rating')->nullable();
            $table->integer('resalePrice')->nullable();
            $table->string('skillModParts', 1000)->nullable();
            $table->smallInteger('skillModSlotCount')->nullable();
            $table->string('vinyls', 15000)->nullable();
            $table->string('visualParts', 1000)->nullable();
            $table->bigInteger('idParentOwnedCarTrans')->nullable();
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
        Schema::drop('custom_cars');
    }
}
