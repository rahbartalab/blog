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
                'name' => 'نمایش کاربران',
                'slug' => 'show-role',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ]
            ,
            [
                'name' => 'افزودن کاربر',
                'slug' => 'add-role',
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'ویرایش کاربر',
                'slug' => 'edit-role',
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'حذف کاربر',
                'slug' => 'delete-role',
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'نمایش نقش ها',
                'slug' => 'show-role',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ]
            ,
            [
                'name' => 'افزودن نقش',
                'slug' => 'add-role',
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'ویرایش نقش',
                'slug' => 'edit-role',
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'حذف نقش',
                'slug' => 'delete-role',
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
