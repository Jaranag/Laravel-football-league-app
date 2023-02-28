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

Route::get('/', [TeamController::class, 'index'])->name('teams.index');
Route::get('/teams/show/$id', [TeamController::class, 'show'])->name('teams.show');
Route::post('/teams/create', [TeamController::class, 'create'])->name('teams.create');
Route::post('/teams/update', [TeamController::class, 'update'])->name('teams.update');
Route::delete('/teams/delete/$id', [TeamController::class, 'create'])->name('teams.create');

Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/show/$id', [GameController::class, 'show'])->name('games.show');
Route::post('/games/create', [GameController::class, 'create'])->name('games.create');
Route::post('/games/update/$id', [GameController::class, 'update'])->name('games.update');
Route::delete('/games/delete/$id', [GameController::class, 'create'])->name('games.create');

