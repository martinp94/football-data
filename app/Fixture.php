<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    protected $table = 'fixtures';

    public function teamHome()
    {
    	return $this->hasOne('App\Team', 'id', 'homeTeam');
    }

    public function teamAway()
    {
    	return $this->hasOne('App\Team', 'id', 'awayTeam');
    }

    public function details()
    {
    	return $this->belongsTo('App\FixtureDetails', 'id', 'fixture_id');
    }

    public function season() 
    {
        return $this->hasOne('App\Season', 'id', 'season_id');
    }
}
