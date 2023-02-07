<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use function view;

class ProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.users.profile.index', [
            'user' => \Auth::user()
        ]);
    }

    public function edit()
    {

    }
}
