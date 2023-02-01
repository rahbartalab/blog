<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use function view;

class HomeController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.dashboard', [
            'user' => Auth::user()
        ]);
    }

    public function home()
    {
        return view('home');
    }
}
