<?php

namespace App\Models\Players;

use Illuminate\Database\Eloquent\Model;

class AgeGroup extends Model
{
    public function players()
    {
        return $this->belongsToMany('App\Models\Players\Player', "players_age_groups");
    }

    public function teams()
    {
        return $this->belongsToMany('App\Models\Games\Team', "teams_age_groups");
    }

    public function fixtures()
    {
        return $this->hasMany('App\Models\Games\Fixture', "age_group_id", "id");
    }
}
