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
        Schema::create('decks', function (Blueprint $table) {
            $table->foreignId('user_id')->references('id')->on('users');
            $table->char('name');
            $table->json('cards');
            $table->tinyInteger('selected');
        });

        Schema::create('cards', function (Blueprint $table) {
            $table->string('name');
            $table->string('category');
            $table->string('type');
            $table->integer('cost');
            $table->integer('dmg');
            $table->integer('life');
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
