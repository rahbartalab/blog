<?php

use App\Http\Controllers\Auth\VerificationEmailController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\User\ProfileController;


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

Route::middleware('verified')->group(__DIR__ . 'verified.php');
