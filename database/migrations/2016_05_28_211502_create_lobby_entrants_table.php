<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLobbyEntrantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lobby_entrants', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('lobbyId')->nullable();
            $table->bigInteger('personaId')->nullable();
            $table->integer('gridIndex')->nullable()->default(0);
            $table->index('lobbyId');
            $table->index('personaId');
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
        Schema::drop('lobby_entrants');
    }
}
