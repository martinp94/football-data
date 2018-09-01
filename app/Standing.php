<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Standing extends Model
{
    protected $table = 'standings';
    protected $fillable = ['season_id', 'stage', 'type', 'group'];

    public function table()
    {
    	return $this->hasMany('App\StandingTable', 'standing_id', 'id');
    }
}
