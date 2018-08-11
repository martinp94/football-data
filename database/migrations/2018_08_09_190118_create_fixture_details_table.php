<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFixtureDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixture_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('winner')->nullable();
            $table->string('duration')->nullable();
            $table->integer('fixture_id')->unsigned();

            $table->integer('homeTeamFT')->nullable();
            $table->integer('awayTeamFT')->nullable();
            $table->integer('homeTeamHT')->nullable();
            $table->integer('awayTeamHT')->nullable();
            $table->integer('homeTeamET')->nullable();
            $table->integer('awayTeamET')->nullable();
            $table->integer('homeTeamPTS')->nullable();
            $table->integer('awayTeamPTS')->nullable();

            $table->timestamps();

            $table->foreign('fixture_id')->references('id')->on('fixtures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fixture_details');
    }
}
