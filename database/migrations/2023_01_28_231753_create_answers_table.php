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

            $table->integer('score');

            $table->uuid('user_id')
                ->unique()
                ->nullable($value = true);

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->uuid('game_id')
                ->unique();

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
