<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStandingsTableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standings_table', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('standing_id')->unsigned();
            $table->integer('team_id')->unsigned();
            $table->integer('position')->nullable();
            $table->integer('playedGames')->nullable();
            $table->integer('won')->nullable();
            $table->integer('draw')->nullable();
            $table->integer('lost')->nullable();
            $table->integer('points')->nullable();
            $table->integer('goalsFor')->nullable();
            $table->integer('goalsAgainst')->nullable();
            $table->integer('goalsDifference')->nullable();

            $table->timestamps();

            $table->foreign('standing_id')->references('id')->on('standings')->onDelete('cascade');
            $table->foreign('team_id')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('standings_table');
    }
}
