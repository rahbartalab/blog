<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{


    public function index()
    {


        return view('auth.register');
    }


    public function store(RegisterUserRequest $request)
    {
        $validated =
        DB::table('users')
            ->insert([
                'first_name' => $request['first_name'],
                'last_name' => $request['last_name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password'])
            ]);

        return redirect('login');
    }
}
