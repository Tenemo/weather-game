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
        Schema::create('answers', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();

            $table->integer('value')->nullable($value = true);
            $table->integer('correct_answer');

            $table->integer('score')->nullable($value = true);

            $table->uuid('user_id')
                ->nullable($value = true);

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->uuid('game_id');

            $table->string('city');
            $table->string('country');
            $table->string('country_code');
            $table->string('continent');

            $table->foreign('game_id')
                ->references('id')
                ->on('games');

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
        Schema::dropIfExists('answers');
    }
};
