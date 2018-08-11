<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $table = "seasons";


    public function fixtures()
    {
    	return $this->hasMany('App\Fixture', 'season_id', 'id');
    }

    public function competitionLeague()
    {
    	return $this->belongsTo('App\Competition', 'competition', 'id');
    }
}
