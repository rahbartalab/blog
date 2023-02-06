<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use PHPUnit\Exception;
use function redirect;
use function view;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class);
    }

    public function index()
    {
        return view('users.index', [
            'users' => User::filter()->paginate(10)
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

    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
        ]);
    }


    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            $user->syncRoles($request->get('role'))->update(array_filter($request->all()));
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage());
            return redirect()->route('users.edit', $user)->with(['error' => 'unexpected error!']);
        }

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
        } catch (Exception $exception) {
            \Log::error($exception->getMessage());
            return redirect()->route('users.index')->with(['error' => 'unexpected error!']);
        }

        return redirect()->route('users.index');
    }
}
