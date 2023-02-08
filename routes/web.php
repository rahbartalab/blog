<?php

use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\Auth\Password\ForgotPasswordController;
use App\Http\Controllers\Auth\Password\ResetPasswordController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\UserController;
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
    Route::resource('profile', ProfileController::class)->except(['store', 'create', 'index']);

    Route::post('logout', [HomeController::class, 'logout'])->name('logout');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});
//
//Route::get('/forgot-password', function () {
//    return view('forgot-password');
//})->middleware([])->name('password.request'); --> DONE
//
//Route::post('/forgot-password', function (\Illuminate\Http\Request $request) {
//
//    $request->validate(['email' => 'required|email']);
//
//    $status = \Illuminate\Support\Facades\Password::sendResetLink(
//        $request->only('email')
//    );
//
//
//    return $status === \Illuminate\Support\Facades\Password::RESET_LINK_SENT
//        ? back()->with(['status' => __($status)])
//        : back()->withErrors(['email' => __($status)]);
//})->middleware([])->name('password.email'); --> DONE
//
//Route::get('/password/{token}', function ($token) {
//    return view('password', ['token' => $token]);
//})->name('password.reset');
//
//Route::post('/password', function (\Illuminate\Http\Request $request) {
//    $request->validate([
//        'token' => 'required',
//        'email' => 'required|email',
//        'password' => 'required|min:8|confirmed',
//    ]);
//
//    $status = Password::reset(
//        $request->only('email', 'password', 'password_confirmation', 'token'),
//        function ($user, $password) {
//            $user->forceFill([
//                'password' => $password
//            ])->setRememberToken(\Illuminate\Support\Str::random(60));
//
//            $user->save();
//
//            event(new \Illuminate\Auth\Events\PasswordReset($user));
//        }
//    );
//
//    return $status === \Illuminate\Support\Facades\Password::PASSWORD_RESET
//        ? redirect()->route('login.index')->with('status', __($status))
//        : back()->withErrors(['email' => [__($status)]]);
//})->middleware('guest')->name('password.update');
