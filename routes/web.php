<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\GameController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Team Routes:

Route::get('/', [TeamController::class, 'index'])->name('teams.index');
Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');

Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
Route::post('/teams/create', [TeamController::class, 'store'])->name('teams.store');

Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');


Route::get('/teams/edit/{team}', [TeamController::class, 'edit'])->name('teams.edit');
Route::patch('/teams/{team}/update', [TeamController::class, 'update'])->name('teams.update');

Route::delete('/teams/{team}/delete/', [TeamController::class, 'delete'])->name('teams.delete');

// Game Routes:

Route::get('/games', [GameController::class, 'index'])->name('games.index');

Route::get('/games/create', [GameController::class, 'create'])->name('games.create');
Route::post('/games', [GameController::class, 'store'])->name('games.store');

Route::get('/games/{game}', [GameController::class, 'show'])->name('games.show');

Route::get('/games/update/{game}', [GameController::class, 'edit'])->name('games.edit');
Route::post('/games/{game}/update', [GameController::class, 'update'])->name('games.update');

Route::delete('/games/{game}/delete', [GameController::class, 'delete'])->name('games.delete');
