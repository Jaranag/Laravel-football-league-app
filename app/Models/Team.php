<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;



class Team extends Model
{
    use HasFactory;

    public function games(): hasMany
    {
        return $this->hasMany(Game::class, 'id', 'local_team');
        return $this->hasMany(Game::class, 'id', 'away_team');


    }
}
