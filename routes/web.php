<?php

use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\Auth\Password\ForgotPasswordController;
use App\Http\Controllers\Auth\Password\ResetPasswordController;
use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\Auth\VerificationEmailController;
use App\Http\Controllers\Blog\CategoryController;
use App\Http\Controllers\Blog\PostController;
use App\Http\Controllers\Blog\TagController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Models\Tag;
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
        Route::get('/', [RegisterUserController::class, 'index'])->name('register.index');
        Route::post('/', [RegisterUserController::class, 'store'])->name('register.store');
    });

    Route::prefix('login')->group(function () {
        Route::get('/', [LoginUserController::class, 'index'])->name('login.index');
        Route::post('/', [LoginUserController::class, 'store'])->name('login.store');
    });

    Route::resource('forgot-password', ForgotPasswordController::class)->only('index', 'store');
    /* --!> must be checked <!-- */
    Route::prefix('reset-password/')->group(function () {
        Route::get('{token}', [ResetPasswordController::class, 'index'])->name('reset-password.index');
        Route::post('/', [ResetPasswordController::class, 'store'])->name('reset-password.store');
    });
});


Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::post('logout', [HomeController::class, 'logout'])->name('logout');
    Route::resource('profile', ProfileController::class)->except(['store', 'create', 'index']);

    Route::prefix('email/verify')->middleware('not_verified')->group(function () {
        Route::get('/', [ProfileController::class, 'verifyEmail'])->name('verification.notice');
        Route::get('/{id}/{hash}', [VerificationEmailController::class, 'verify'])
            ->middleware('signed')->name('verification.verify');
        Route::post('/resend', [VerificationEmailController::class, 'resendVerificationEmail'])
            ->middleware('throttle:6,1')->name('verification.send');
    });

    Route::middleware('verified')->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('tags', TagController::class);
        Route::resource('posts', PostController::class);
        Route::resource('comments', \App\Http\Controllers\Blog\CommentController::class)->except('show');
    });
});
