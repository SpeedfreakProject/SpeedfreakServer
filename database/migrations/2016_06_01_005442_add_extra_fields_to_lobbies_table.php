<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExtraFieldsToLobbiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lobbies', function (Blueprint $table) {
            DB::statement('ALTER TABLE lobbies ADD COLUMN isInviteEnabled BIT NOT NULL');
            DB::statement('ALTER TABLE lobbies ADD COLUMN isWaiting BIT NOT NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lobbies', function (Blueprint $table) {
            DB::statement('ALTER TABLE lobbies DROP COLUMN isInviteEnabled');
            DB::statement('ALTER TABLE lobbies DROP COLUMN isWaiting');
        });
    }
}
