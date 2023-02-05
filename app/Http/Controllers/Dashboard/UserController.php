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
        return redirect()->route('login.index');
    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function index()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
