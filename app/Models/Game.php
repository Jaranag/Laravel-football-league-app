<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Team;

class Game extends Model
{
    use HasFactory;


    public function local_team() {
        return $this->belongsTo(Team::class, 'local_team_id');
    }

    public function away_team() {
        return $this->belongsTo(Team::class, 'away_team_id');
    }
}
