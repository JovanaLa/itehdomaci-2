<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OcenaController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\BioskopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserOcenaController;
use App\Http\Controllers\BioskopOcenaController;
use App\Http\Controllers\FilmOcenaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
    return $request->user();
});

Route::resource('film', FilmController::class);

Route::resource('bioskop', BioskopController::class);

Route::resource('ocena', OcenaController::class);

Route::resource('users', UserController::class)->only(['index', 'show']);


Route::get('/users/{id}/ocena', [UserOcenaController::class, 'index']);

Route::get('/bioskop/{id}/ocena', [FilmOcenaController::class, 'index']);

Route::get('/film/{id}/ocena', [FilmOcenaController::class, 'index']);