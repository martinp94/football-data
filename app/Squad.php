<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Squad extends Model
{
    protected $table = 'squads';
    protected $fillable = ['team_id', 'person_id'];
}
