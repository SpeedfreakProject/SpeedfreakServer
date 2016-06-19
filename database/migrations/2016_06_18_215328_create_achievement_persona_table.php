<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAchievementPersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achievement_persona', function (Blueprint $table) {
            $table->integer('persona_id');
            $table->integer('achievement_id');
            $table->timestamp('awardedAt')->nullable();
            $table->boolean('canProgress');
            $table->integer('currentValue');
            $table->string('progressText');
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
        Schema::drop('achievement_persona');
    }
}
