<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('idcategory');
            $table->string('catalogVersion', 45);
            $table->string('categories', 45)->nullable();
            $table->string('displayName', 255)->nullable();
            $table->integer('filterType');
            $table->string('icon', 45)->nullable();
            $table->bigInteger('id');
            $table->string('longDescription', 45)->nullable();
            $table->string('name', 255);
            $table->smallInteger('priority');
            $table->string('shortDescription', 45)->nullable();
            $table->tinyInteger('showInNavigationPane');
            $table->tinyInteger('showPromoPage');
            $table->string('webIcon', 45)->nullable();
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
        Schema::drop('categories');
    }
}
