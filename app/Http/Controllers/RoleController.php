<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return view('roles.index', [
            "roles" => Role::filter()->get()
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
        $role = Role::create(array_merge($request->validated(), ['slug' => \Str::slug($request['name'])]));
        $role->givePermissionTo($request['permissions']);

        return redirect(route('roles.index'));
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
