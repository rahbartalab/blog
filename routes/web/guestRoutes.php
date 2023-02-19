<?php

use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\Auth\Password\ForgotPasswordController;
use App\Http\Controllers\Auth\Password\ResetPasswordController;
use App\Http\Controllers\Auth\RegisterUserController;

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
