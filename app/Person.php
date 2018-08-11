<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'persons';

    public function teams()
	{
		return $this->belongsToMany('App\Team', 'squads', 'person_id', 'team_id');
	}
}
