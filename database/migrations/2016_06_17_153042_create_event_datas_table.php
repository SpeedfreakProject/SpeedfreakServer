<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_data', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('eventId');
            $table->bigInteger('eventSessionId');
            $table->boolean('eventLaunched');
            $table->boolean('isSinglePlayer');
            $table->bigInteger('personaId');
            $table->bigInteger('carId');
            $table->integer('finishReason');
            $table->smallInteger('rank');
            $table->bigInteger('eventDurationInMS');
            $table->bigInteger('bestLapTimeInMS');
            $table->float('topSpeed');
            
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
        Schema::drop('event_data');
    }
}
