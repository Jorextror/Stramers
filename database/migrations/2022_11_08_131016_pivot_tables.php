<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Tabla pivot mazos - cartas
        Schema::create('card_deck', function (Blueprint $table) {
            $table->integer('card_id')->unsigned();
            $table->integer('deck_id')->unsigned();
        });

        //Tabla pivot usuario - cartas
        Schema::create('card_user', function (Blueprint $table) {
            $table->integer('card_id')->unsigned();
            $table->integer('user_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
