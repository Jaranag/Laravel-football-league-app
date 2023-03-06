<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;


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
        $games = Team::find($team)->games;
        return view('teams.show', ['team' => $team, 'games' => $games]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|unique:teams|max:20',
            'coach' => 'required|max:40',
            'stadium' => 'required|max30'
        ]);
        $newTeam = new Team;
        $newTeam->name = $request->name;
        $newTeam->coach = $request->coach;
        $newTeam->stadium = $request->stadium;
        $newTeam->save();
        session()->flash('status', 'Team Created!');

        return to_route('teams.index');
    }

    public function update(Request $request, Team $team) {
        $request->validate([
            'name' => 'required|unique:teams|max:20',
            'coach' => 'required|max:40',
            'stadium' => 'required|max30'
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
