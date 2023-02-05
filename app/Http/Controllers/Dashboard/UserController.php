<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use function redirect;

class UserController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
