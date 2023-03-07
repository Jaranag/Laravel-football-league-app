<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;



class Team extends Model
{
    use HasFactory;

    public function local_games()
    {
        return $this->hasMany(Game::class, 'local_team_id');
    }

    public function away_games()
    {
        return $this->hasMany(Game::class, 'away_team_id');
    }
}
