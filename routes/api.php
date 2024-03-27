<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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
Route::post('User/Login',[ProfileController::class , 'login']);

Route::get('/index' , function (){
    return response()->json('hello') ;
});


Route::middleware('auth')->group(function(){

});