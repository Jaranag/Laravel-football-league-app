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

    public function show($id) {
        return view('teams.show', ['team' => Team::findOrFail($id)]);
    }

    public function store(Request $request) {
        $newTeam = new Team;
        $newTeam->name = $request->name;
        $newTeam->coach = $request->coach;
        $newTeam->stadium = $request->stadium;
        $newTeam->save();
        return to_route('teams.index');
    }

    public function update(Request $request, Team $team) {
        $team->name = $request->input('name');
        $team->coach = $request->input('coach');
        $team->stadium = $request->input('stadium');
        $team->save();
        session()->flash('status', 'Team Updated!');
        return to_route('teams.show', $team->id);
    }

    public function delete(Team $team) {
        $team->delete();
        return to_route('teams.index');
    }


}
