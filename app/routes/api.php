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
use App\Http\Controllers\API\AuthController;
use App\Http\Resources\UserResource;

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

Route::middleware('auth:sanctum')->get('/myprofile', function (Request $request) {
    return new UserResource($request->user());
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    //metode kojima moze da pristupi admin
    Route::resource('film', FilmController::class)->only(['store', 'update', 'destroy']);
    Route::resource('bioskop', BioskopController::class)->only(['store', 'update', 'destroy']);
    Route::resource('users', UserController::class)->only(['destroy']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::resource('users', UserController::class)->only(['index', 'show']);

    //korisnik moze da pristupi metodi
    Route::resource('ocena', OcenaController::class)->only(['store', 'update', 'destroy']);

    // svi ulogovani
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/myapprat', [UserOcenaController::class, 'myapprat']);
    Route::resource('users', UserController::class)->only(['update']);
});

Route::resource('film', FilmController::class)->only(['index', 'show']);

Route::resource('bioskop', BioskopController::class)->only(['index', 'show']);

Route::resource('ocena', OcenaController::class)->only(['index', 'show']);

Route::get('/users/{id}/ocena', [UserOcenaController::class, 'index']);

Route::get('/bioskop/{id}/ocena', [FilmOcenaController::class, 'index']);

Route::get('/film/{id}/ocena', [FilmOcenaController::class, 'index']);

Route::post('/login', [AuthController::class, 'login']);