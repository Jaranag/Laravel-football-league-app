<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Game;



class TeamController extends Controller
{
    public function index() {
        return view('teams.index', ['teams' => Team::get()]);
    }

    public function create() {
        return view('teams.create');
    }

    public function edit(Team $team) {
        return view('teams.update', ['team' => $team]);
    }

    public function show(Team $team) {
        // $games = Game::get()->where([
        //     ['local_team_id', $team->id],
        //     ['away_team_id', $team->id],
        // ]);
        // $games = Game::where('local_team_id', $team->id)->orWhere('away_team_id', $team->id);
        $games = array();
        $allGames = Game::get();

        foreach($allGames as $game) {
            if (($game->local_team_id == $team->id) || ($game->away_team_id == $team->id))  {
                array_push($games, $game);
            }
        }

        return view('teams.show', ['team' => $team, 'games' => $games]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => ['required','unique:teams','max:20'],
            'coach' =>  ['required','max:40'],
            'stadium' => ['required','max:30'],
            'image' => ['mimes:jpg,png,jpeg|max:5048']
        ]);
        $newTeam = new Team;
        $newTeam->name = $request->name;
        $newTeam->coach = $request->coach;
        $newTeam->stadium = $request->stadium;
        if($request->image) {
            $newImageName = 'images/' . time() . '-' . $request->name . '.' . $request->image->extension();
            $newTeam->image_path = $newImageName;
            $request->image->move(public_path('images'), $newImageName);
        } else {
            $newTeam->image_path = 'defaults/5042057-default.png';
        }
        $newTeam->save();
        session()->flash('status', 'Team Created!');

        return to_route('teams.index');
    }

    public function update(Request $request, Team $team) {
        $request->validate([
            'name' => ['required','unique:teams','max:20'],
            'coach' =>  ['required','max:40'],
            'stadium' => ['required','max:30']
        ]);
        $team->name = $request->input('name');
        $team->coach = $request->input('coach');
        $team->stadium = $request->input('stadium');
        $team->save();
        session()->flash('status', 'Team Updated!');
        return to_route('teams.show', $team);
    }

    public function delete(Team $team) {
        $team->delete();

        session()->flash('status', 'Team Deleted!');

        return to_route('teams.index');
    }


}
