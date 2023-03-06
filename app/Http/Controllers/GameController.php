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

    public function edit(Game $game) {
        return view('games.edit', ['game' => $game]);
    }

    public function show(Game $game) {
        return view('games.show', ['game' => $game]);
    }

    public function store(Request $request) {

        $request->validate([
            'local_team' => 'required|different:away_team_id',
            'away_team' => 'required|different:local_team_id',
            'date' => 'required',
            'time' => 'required'
        ]);

        $newGame = new Game;
        $newGame->local_team_id = $request->local_team;
        $newGame->away_team_id = $request->away_team;
        $newGame->date = $request->date;
        $newGame->time = $request->time;
        $newGame->save();
        session()->flash('status', 'Game Created!');
        return to_route('teams.index');
        
    }

    public function update(Request $request, Game $game) {
        $request->validate([
            'local_goals' => 'required|integer|between:0,20',
            'away_goals' => 'required|integer|between:0,20'
        ]);
        $game->local_goals = $request->input('local_goals');
        $game->away_goals = $request->input('away_goals');
        $game->save();
        session()->flash('status', 'Score updated!');
        return to_route('games.show', $game);
    }

    public function delete(Game $game) {
        $game->delete();
        session()->flash('status', 'Game Deleted!');
        return to_route('teams.index');
    }
}
