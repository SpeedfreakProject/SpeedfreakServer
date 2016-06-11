<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_definitions', function (Blueprint $table) {
            $table->bigInteger('eventId');
            $table->integer('carClassHash')->nullable();
            $table->integer('coins')->nullable();
            $table->float('engagePointX')->nullable();
            $table->double('engagePointY')->nullable();
            $table->double('engagePointZ')->nullable();
            $table->integer('eventLocalization')->nullable();
            $table->integer('eventModeDescriptionLocalization')->nullable();
            $table->string('eventModeIcon')->nullable();
            $table->integer('eventModeId')->nullable();
            $table->integer('eventModeLocalization')->nullable();
            $table->string('isEnabled')->nullable();
            $table->string('isLocked')->nullable();
            $table->integer('laps')->nullable();
            $table->integer('length')->nullable();
            $table->integer('maxClassRating')->nullable();
            $table->integer('maxEntrants')->nullable();
            $table->integer('maxLevel')->nullable();
            $table->integer('minClassRating')->nullable();
            $table->integer('minEntrants')->nullable();
            $table->integer('minLevel')->nullable();
            $table->integer('regionLocalization')->nullable();
            $table->integer('rewardMode1')->nullable();
            $table->integer('rewardMode2')->nullable();
            $table->integer('rewardMode3')->nullable();
            $table->integer('timeLimit')->nullable();
            $table->string('trackLayoutMap')->nullable();
            $table->integer('trackLocalization')->nullable();
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
        Schema::drop('event_definitions');
    }
}
