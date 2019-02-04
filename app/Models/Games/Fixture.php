<?php

namespace App\Models\Games;

use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    protected $fillable = ['fixture_num', 'team_home_id', 'team_away_id', 'age_group_id', "home_goals", "away_goals", "match_date", "match_time"];
}
