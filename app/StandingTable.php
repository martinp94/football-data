<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StandingTable extends Model
{
    protected $table = 'standings_table';
    protected $fillable = ['standing_id', 'team_id', 'position', 'playedGames', 'won', 'draw', 'lost', 'points', 'goalsFor', 'goalsAgainst', 'goalsDifference'];
}
