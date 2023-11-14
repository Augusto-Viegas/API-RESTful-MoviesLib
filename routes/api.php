<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//#Controllers:
use App\Http\Controllers\MoviesLibController;
use App\Http\Controllers\MovieTagController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('movies', MoviesLibController::class);
Route::apiResource('movieTags', MovieTagController::class);
