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
            $table->char('name');
            $table->boolean('selected');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('cards', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('name')->unique();
            $table->string('category');
            $table->string('type');
            $table->integer('cost');
            $table->integer('dmg');
            $table->integer('life');
            $table->timestamps();
            $table->softDeletes();
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
