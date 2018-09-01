<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

	protected $fillable = ['id', 'name', 'area', 'shortname', 'tla', 'address', 'phone', 'website', 'email', 'founded', 'club_colors', 'venue', 'image', 'created_at', 'updated_at'];
    
	public function country()
	{
		return $this->belongsTo('App\Area', 'area', 'id');
	}

	public function persons()
	{
		return $this->belongsToMany('App\Person', 'squads', 'team_id', 'person_id');
	}

	public function homeFixtures() 
	{
		return $this->hasMany('App\Fixture', 'homeTeam');
	}

	public function awayFixtures() 
	{
		return $this->hasMany('App\Fixture', 'awayTeam');
	}

	public function currentSeason()
	{
		$seasonId = null;
		

		foreach ($this->homeFixtures as $fixture) {
			if($fixture->status == 'SCHEDULED')
				$seasonId = $fixture->season_id;
		}	

		if($seasonId)
			return Season::where('id', '=', $seasonId)->first();

		
	}

	public function currentCompetition()
	{
		if($this->currentSeason() == null)
			return ['name' => " - "];

		$competitionId = $this->currentSeason()->competition;
		if($competitionId)
			return Competition::where('id', '=', $competitionId)->first();

	}

}
