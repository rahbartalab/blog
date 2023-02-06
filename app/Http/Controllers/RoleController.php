<?php

namespace App\Http\Controllers;

use App\Http\Requests\Role\CreateRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Models\Role;
use PHPUnit\Exception;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Role::class);
    }

    public function index()
    {
        return view('roles.index', [
            'roles' => Role::filter()->get()
        ]);
    }

    public function create()
    {
        return view('roles.create', [
            'permissions' => Permission::all()
        ]);
    }


    public function store(CreateRoleRequest $request)
    {
        /* @var $role Role */

        try {
            $role = Role::create(array_merge($request->validated(), ['slug' => Role::createSlug($request->get('name'))]));
            $role->givePermissionTo($request->get('permissions'));
        } catch (Exception $exception) {
            \Log::error($exception->getMessage());
            return redirect()->route('roles.create')->with(['error' => 'unexpected error!']);
        }
        return redirect()->route('roles.index');
    }


    public function show($id)
    {
        return view('roles.show', [
            'role' => Role::findOrFail($id)
        ]);
    }


    public function edit($id)
    {
        return view('roles.edit', [
            'role' => Role::findOrFail($id),
            'permissions' => Permission::all()
        ]);
    }

    public function update(UpdateRoleRequest $request, $id)
    {
        try {
            Role::findOrFail($id)->syncPermissions($request->get('permissions'))->update($request->validated());
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage());
            return redirect()->route('roles.edit')->with(['error' => 'unexpected error!']);
        }
        return redirect()->route('roles.edit', $id);
    }


    public function destroy($id)
    {
        try {
            Role::findOrFail($id)->delete();
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage());
            return redirect()->route('roles.index')->with(['error' => 'unexpected error!']);
        }
        return redirect()->route('roles.index');
    }
}
