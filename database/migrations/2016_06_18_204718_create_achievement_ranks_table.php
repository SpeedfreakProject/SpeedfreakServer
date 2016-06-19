<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAchievementRanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achievement_ranks', function (Blueprint $table) {
            $table->increments('achievementRankId');
            $table->integer('achievement_id');
            $table->boolean('isRare')->default(false);
            $table->integer('rank')->default(0);
            $table->integer('points')->default(50);
            $table->float('rarity')->default(0);
            $table->string('rewardDescription')->default('');
            $table->string('rewardType')->default('cash');
            $table->string('rewardVisualStyle')->default('achievements_rewards');
            $table->integer('thresholdValue')->default(0);

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
        Schema::drop('achievement_ranks');
    }
}
