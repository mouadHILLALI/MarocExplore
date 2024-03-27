<?php

use App\Http\Controllers\DestinationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrajectoryController;

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



Route::post('/User/register',[ProfileController::class , 'register']);
Route::post('/User/Login',[ProfileController::class , 'login']);



Route::middleware('auth:sanctum')->group(function(){
    Route::post('/Trajectory/Create',[TrajectoryController::class , 'createTrajectory']);
    Route::post('/Trajectory/Edit',[TrajectoryController::class , 'editTrajectory']);
    Route::post('/Destination/Create',[DestinationController::class , 'addDestination']);
    Route::get('/Trajectory/Show',[TrajectoryController::class , 'index']);
    Route::get('/Trajectory/Search',[TrajectoryController::class , 'search']);
    Route::get('/Trajectory/Filter',[TrajectoryController::class , 'filter']);
});
