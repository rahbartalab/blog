<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    public function dashboard()
    {
        return view('dashboard', [
            "username" => Auth::user()->first_name
        ]);
    }

    public function home()
    {
        return view('home');
    }
}
