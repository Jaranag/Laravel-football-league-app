<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Game;


class GameController extends Controller
{
    public function index() {
        return view('games.index', ['games' => Game::get()]);
    }

    public function create() {
        return view('games.create',  ['teams' => Team::get()]);
    }

    public function store(Request $request) {
        $newGame = new Game;
        $newGame->local_team_id = $request->local_team;
        $newGame->away_team_id = $request->away_team;
        $newGame->date = $request->date;
        $newGame->time = $request->time;
        $newGame->save();
        return to_route('teams.index');
    }
}
