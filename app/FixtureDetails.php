<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FixtureDetails extends Model
{
    protected $table = 'fixture_details';
    protected $fillable = ['winner', 'duration', 'fixture_id', 'homeTeamFT', 'awayTeamFT', 'homeTeamHT', 'awayTeamHT', 'homeTeamET', 'awayTeamET', 'homeTeamPTS', 'awayTeamPTS'];
}
