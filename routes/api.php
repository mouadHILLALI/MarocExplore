<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::post('User/Register',[ProfileController::class , 'register']);
Route::post('User/Login',[ProfileController::class , 'login']);
