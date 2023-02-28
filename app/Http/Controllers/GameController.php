<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Game;


class GameController extends Controller
{
    public function index() {
        $games = Game::get();
        return view('games.index', $games);
    }
}
