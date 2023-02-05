<?php

namespace Database\Seeders;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* @var $role Role */
        $role = Role::create([
            'name' => 'admin',
            'slug' => 'admin',
            'guard_name' => 'web',
            'created_at' => Carbon::now()
        ]);
        $role->givePermissionTo(Permission::all());
    }
}

