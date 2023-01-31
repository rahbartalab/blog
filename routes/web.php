<?php

use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

/* --!> authentication routes <!-- */
Route::get('/register', [RegisterUserController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterUserController::class, 'store'])->middleware('guest');


Route::get('/login', [LoginUserController::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [LoginUserController::class, 'store'])->middleware('guest');

Route::post('logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard')->middleware('auth');


///* --!> test routes <!-- */
//Route::get('/mail', function () {
//
//    return new RegisterMail();
//});
