<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->ipAddress('ipAddress');
            $table->integer('userId');
            $table->integer('personaId')->nullable();
            $table->string('securityToken');
            $table->integer('eventSessionId')->nullable();
            $table->string('relayCryptoTicket')->nullable();
            $table->string('relaySessionKey')->nullable();
            $table->timestamp('expirationDate')->nullable();
            $table->timestamp('realCreated')->nullable();

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
        Schema::drop('sessions');
    }
}
