<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\LoginController;

Route::view('/', 'signin');
Route::view('/signup', 'signup');
Route::post('/', [LoginController::class, 'signin']);
Route::post('/signup', [LoginController::class, 'signup']);
