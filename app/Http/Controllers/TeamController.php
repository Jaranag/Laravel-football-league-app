<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;


class TeamController extends Controller
{
    public function index() {
        $teams = Team::get();
        return view('teams.index', $teams);
    }

    public function create(Request $request) {
        $newTeam = new Team;
        $newTeam->name = $request->name;
        $newTeam->coach = $request->coach;
        $newTeam->stadium = $request->stadium;
        $newTeam->save();
        redirect('/');
    }

    public function update(Request $request, $id) {
        $teamToUpdate = Team::find($id);
        $teamToUpdate->name = $request->name;
        $teamToUpdate->coach = $request->coach;
        $teamToUpdate->stadium = $request->stadium;
        $teamToUpdate->save();
        redirect('/');
    }

    public function delete($id) {
        $teamToDelete = Team::find($id);
        $teamToDelete->delete();
        redirect('/');
    }


}
