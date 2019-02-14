<?php

namespace App\Models\Games;

use Awobaz\Compoships\Compoships;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use Compoships;
    protected $fillable = ["name"];

    public function agegroups()
    {
        return $this->belongsToMany('App\Models\Players\AgeGroup', "teams_age_groups");
    }

    // public function fixtures()
    // {
    //     return $this->hasMany('App\Models\Games\Fixture', ['team_home_id'], ['id']);
    // }
}
