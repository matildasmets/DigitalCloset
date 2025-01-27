<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authentication;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SessionController;

Route::view('/', 'signin');
Route::view('/signup', 'signup');
Route::post('/', [SessionController::class, 'signin']);
Route::post('/signup', [SessionController::class, 'signup']);

Route::middleware([Authentication::class])->group(function () {
    Route::get('/dashboard', [MainController::class, 'index']);
    Route::get('/closet', [MainController::class, 'closet']);
    Route::get('/random', [MainController::class, 'random']);
    Route::post('/dashboard/put-outfit-together', [MainController::class, 'create']);
    Route::post('/dashboard/add/top', [MainController::class, 'addTop']);
    Route::post('/dashboard/add/pants', [MainController::class, 'addPants']);
    Route::post('/dashboard/add/shoes', [MainController::class, 'addShoes']);
    Route::post('/dashboard/add/jacket', [MainController::class, 'addJacket']);
    Route::post('/dashboard/add/accessory', [MainController::class, 'addAccessory']);
});
