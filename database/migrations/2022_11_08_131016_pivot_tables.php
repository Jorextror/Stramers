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
            $table->integer('id_deck');
            $table->integer('id_card');
        });

        //Tabla pivot usuario - cartas
        Schema::create('user_cards', function (Blueprint $table) {
            $table->integer('id_user');
            $table->integer('id_card');
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
