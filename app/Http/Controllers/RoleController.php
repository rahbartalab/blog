<?php

namespace App\Http\Controllers;

use App\Http\Requests\Role\CreateRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
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
        $role = Role::create(array_merge($request->validated(), ['slug' => \Str::slug($request->get('name'))]));
        $role->givePermissionTo($request->get('permissions'));

        return redirect()->route('roles.index');
    }


    public function show($id)
    {
        return view('roles.show', [
            'role' => Role::findById($id)
        ]);
    }


    public function edit($id)
    {
        return view('roles.edit', [
            'role' => Role::findById($id),
            'permissions' => Permission::all()
        ]);
    }

    public function update(UpdateRoleRequest $request, $id)
    {
        Role::findById($id)->syncPermissions($request['permissions'])->update($request->validated());

        return redirect()->route('roles.edit', $id);
    }


    public function destroy($id)
    {
        Role::findById($id)->delete();

        return redirect()->route('roles.index');
    }
}
