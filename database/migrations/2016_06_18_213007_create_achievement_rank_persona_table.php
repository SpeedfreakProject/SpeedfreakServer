<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAchievementRankPersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achievement_rank_persona', function (Blueprint $table) {
            $table->integer('persona_id');
            $table->integer('achievement_rank_id');
            $table->string('state')->default('Locked');
            $table->timestamp('achievedOn');
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
        Schema::drop('achievement_rank_persona');
    }
}
