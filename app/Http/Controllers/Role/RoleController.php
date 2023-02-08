<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\CreateRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Models\Role;
use PHPUnit\Exception;
use Spatie\Permission\Models\Permission;
use function redirect;
use function view;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Role::class);
    }

    public function index()
    {
        return view('dashboard.roles.index', [
            'roles' => Role::filter()->paginate(10)
        ]);
    }

    public function create()
    {
        return view('dashboard.roles.create', [
            'permissions' => Permission::all()
        ]);
    }

    public function store(CreateRoleRequest $request)
    {
        /* @var $role Role */

        try {
            /* --!> merging validated data with slug : user give all data ,but we must create slug for every role <!-- */
            $data = array_merge($request->validated(), ['slug' => Role::createSlug($request->get('name'))]);

            $role = Role::create($data);
            $role->givePermissionTo($request->get('permissions'));

        } catch (Exception $exception) {
            \Log::error($exception->getMessage());
            return redirect()->route('roles.create')->with(['error' => 'unexpected error!']);
        }
        return redirect()->route('roles.index');
    }

    public function show(Role $role)
    {
        return view('dashboard.roles.show', [
            'role' => $role
        ]);
    }

    public function edit(Role $role)
    {
        return view('dashboard.roles.edit', [
            'role' => $role,
            'permissions' => Permission::all()
        ]);
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        try {
            $role->syncPermissions($request->get('permissions'))->update($request->validated());
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage());
            return redirect()->route('roles.edit', $role->id)->with(['error' => 'unexpected error!']);
        }
        return redirect()->route('roles.edit', $role);
    }

    public function destroy(Role $role)
    {
        try {
            $role->delete();
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage());
            return redirect()->route('roles.index')->with(['error' => 'unexpected error!']);
        }
        return redirect()->route('roles.index');
    }
}
