<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\users\CreateUserRequest;
use App\Http\Requests\users\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Policies\User\UserPolicy;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Exception;
use function redirect;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class);
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
            \Log::error($exception->getMessage());
            return redirect()->route('users.create')->with(['error' => 'unexpected error!']);
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
            \Log::error($exception->getMessage());
            return redirect()->route('users.edit')->with(['error' => 'unexpected error!']);
        }

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        try {
            User::findOrFail($id)->delete();
        } catch (Exception $exception) {
            \Log::error($exception->getMessage());
            return redirect()->route('users.index')->with(['error' => 'unexpected error!']);
        }

        return redirect()->route('users.index');
    }
}
