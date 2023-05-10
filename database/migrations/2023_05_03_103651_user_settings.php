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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('background_profile')->default('1');
            $table->integer('avatar')->nullable();
        });

        Schema::create('background_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('background_id')->unsigned();
        });

        Schema::create('backgrounds', function (Blueprint $table){
            $table->id()->unique()->autoIncrement();
            $table->string('name');
            $table->string('img')->nullable();
            $table->string('color')->nullable();
            $table->integer('cost');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
};
