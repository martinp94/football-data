<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    

    public function country()
	{
		return $this->belongsTo('App\Area', 'area', 'id');
	}

	public function seasons()
	{
		return $this->hasMany('App\Season', 'competition', 'id');
	}
}
