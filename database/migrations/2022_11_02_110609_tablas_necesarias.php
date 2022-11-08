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
            $table->id()->unique();
            $table->foreignId('user_id')->references('id')->on('users');
            // $table->foreignId('card_id')->references('id')->on('cards');
            $table->char('name');
            $table->tinyInteger('selected');
            $table->timestamps();
            $table->timestamp('eliminated_at');
        });

        Schema::create('cards', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('name');
            $table->string('category');
            $table->string('type');
            $table->integer('cost');
            $table->integer('dmg');
            $table->integer('life');
            $table->timestamps();
            $table->timestamp('eliminated_at');
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
