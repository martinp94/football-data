<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFixturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixtures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('season_id')->unsigned();
            $table->dateTime('date')->nullable();
            $table->string('status')->nullable();
            $table->string('stage')->nullable();
            $table->string('fixture_group')->nullable();
            $table->integer('matchday')->nullable();
            $table->integer('homeTeam')->unsigned();
            $table->integer('awayTeam')->unsigned();
            $table->timestamps();

            $table->foreign('season_id')->references('id')->on('seasons');

            $table->foreign('homeTeam')->references('id')->on('teams');
            $table->foreign('awayTeam')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fixtures');
    }
}
