<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PlayerController;
use App\Http\Controllers\Api\PositionController;

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

Route::controller(PlayerController::class)->prefix('players')->group(function() {
    Route::get('', 'index');
    Route::post('', 'create');
    Route::get('{id}', 'show');
    Route::put('{id}', 'update');
    Route::get('{id}/stats-avg', 'getPlayerPerformance');
});

Route::controller(PositionController::class)->prefix('positions')->group(function() {
    Route::get('', 'index');
    Route::post('', 'create');
});
