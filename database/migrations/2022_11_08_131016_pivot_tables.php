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
        Schema::create('decks_cards', function (Blueprint $table) {
            $table->integer('deck_id')->unsigned();
            $table->integer('card_id')->unsigned();
        });

        //Tabla pivot usuario - cartas
        Schema::create('user_cards', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('card_id')->unsigned();
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
