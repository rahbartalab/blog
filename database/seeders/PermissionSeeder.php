<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Db::table('permissions')->insert([
            [
                'name' => 'نمایش مدیران',
                'slug' => 'show-role',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ]
            ,
            [
                'name' => 'افزودن مدیر',
                'slug' => 'add-role',
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'ویرایش مدیر',
                'slug' => 'edit-role',
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'حذف مدیر',
                'slug' => 'delete-role',
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'نمایش کاربران',
                'slug' => 'show-users',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
