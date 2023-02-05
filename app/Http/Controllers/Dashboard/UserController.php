<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\users\CreateUserRequest;
use App\Http\Requests\users\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use function redirect;

class UserController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }

    public function index()
    {
        return view('users.index', [
            'users' => User::all()
        ]);
    }

    public function create()
    {
        return view('users.create', [
            'roles' => Role::all()
        ]);
    }

    public function store(CreateUserRequest $request)
    {
        try {
            User::create($request->validated())->assignRole($request->get('role'));
        } catch (\Exception $exception) {
            return redirect()->back(500);
        }
        return redirect()->route('users.index');
    }

    public function show($id)
    {
        return view('users.show', [
            'user' => User::findOrFail($id)
        ]);
    }


    public function edit($id)
    {
        return view('users.edit', [
            'user' => User::findOrFail($id),
            'roles' => Role::all()
        ]);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        try {
            User::findOrFail($id)->syncRoles($request->get('role'))->update(array_filter($request->all()));
        } catch (\Exception $exception) {
            return redirect()->back(500);
        }

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('users.index');
    }
}
