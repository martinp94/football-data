<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'persons';
    protected $fillable = ['id', 'name', 'uriname', 'position', 'dateOfBirth', 'nationality', 'role', 'image'];

    public function teams()
	{
		return $this->belongsToMany('App\Team', 'squads', 'person_id', 'team_id');
	}
}
