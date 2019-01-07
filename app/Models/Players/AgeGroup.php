<?php

namespace App\Models\Players;

use Illuminate\Database\Eloquent\Model;

class AgeGroup extends Model
{
    public function players()
    {
        return $this->belongsToMany('App\Models\Player', "players_age_groups");
    }
}
