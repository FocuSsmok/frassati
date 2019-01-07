<?php

namespace App\Models\Players;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    public function agegroups()
    {
        return $this->belongsToMany('App\Models\Players\AgeGroup', "players_age_groups");
    }

    public function positions()
    {
        return $this->belongsToMany("App\Models\Players\Position", "players_age_groups");
    }
}
