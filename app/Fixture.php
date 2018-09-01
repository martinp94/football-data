<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    protected $table = 'fixtures';
    protected $fillable = ['id', 'season_id', 'date', 'status', 'stage', 'fixture_group', 'matchday', 'homeTeam', 'awayTeam'];

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
