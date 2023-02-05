<?php

namespace App\Http\Controllers;

use App\Http\Requests\Role\CreateRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Models\Role;
use PHPUnit\Exception;
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

        try {
            $role = Role::create(array_merge($request->validated(), ['slug' => Role::createSlug($request->get('name'))]));
            $role->givePermissionTo($request->get('permissions'));
        } catch (Exception $exception) {
            return redirect()->back(500);
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
        Role::findOrFail($id)->syncPermissions($request->get('permissions'))->update($request->validated());

        return redirect()->route('roles.edit', $id);
    }


    public function destroy($id)
    {
        Role::findOrFail($id)->delete();

        return redirect()->route('roles.index');
    }
}
