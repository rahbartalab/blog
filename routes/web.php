<?php

use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});


/* --!> authentication routes <!-- */
Route::get('/register', [RegisterUserController::class, 'index'])->name('register');
Route::post('/register', [RegisterUserController::class, 'store']);


Route::get('/login', [LoginUserController::class, 'index'])->name('login');
Route::post('login', [LoginUserController::class, 'store']);

Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

///* --!> test routes <!-- */
//Route::get('/mail', function () {
//
//    return new RegisterMail();
//});
