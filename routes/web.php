<?php

use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [HomeController::class, 'home'])->name('home');

Route::middleware('guest')->group(function () {
    Route::prefix('register')->group(function () {
        Route::get('/', [RegisterUserController::class, 'index'])->name('register');
        Route::post('/', [RegisterUserController::class, 'store']);
    });

    Route::prefix('login')->group(function () {
        Route::get('/', [LoginUserController::class, 'index'])->name('login');
        Route::post('/', [LoginUserController::class, 'store']);
    });
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
});


