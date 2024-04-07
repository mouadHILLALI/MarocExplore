<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DestinationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrajectoryController;
use App\Http\Controllers\VisitListesController;

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

Route::get('/Trajectory/Search',[TrajectoryController::class , 'search']);
Route::get('/Trajectory/Filter',[TrajectoryController::class , 'filter']);

Route::get('/categories/show', [CategoryController::class , 'show']);
Route::middleware('auth:sanctum')->group(function(){
    Route::get('/Trajectory/Show',[TrajectoryController::class , 'index']);
    Route::post('/User/logout',[ProfileController::class , 'logout']);
    Route::post('/Trajectory/Create',[TrajectoryController::class , 'createTrajectory']);
    Route::delete('/Trajectory/Delete/{id}',[TrajectoryController::class , 'deleteTrajectory']);
    Route::post('/Trajectory/Edit',[TrajectoryController::class , 'editTrajectory']);
    Route::post('/Destination/Create/{id}',[DestinationController::class , 'addDestination']);
    Route::post('/visitlist/Create',[VisitListesController::class , 'addtoList']);
});
