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
                'name' => 'users.index',
                'fa-name' => 'نمایش کاربران',
                'slug' => 'show-role',
                'guard_name' => 'web',
            ]
            ,
            [
                'name' => 'users.create',
                'fa-name' => 'افزودن کاربر',
                'slug' => 'add-role',
                'guard_name' => 'web',
            ],
            [
                'name' => 'users.update',
                'fa-name' => 'ویرایش کاربر',
                'slug' => 'edit-role',
                'guard_name' => 'web',
            ],
            [
                'name' => 'users.destroy',
                'fa-name' => 'حذف کاربر',
                'slug' => 'delete-role',
                'guard_name' => 'web',
            ],
            [
                'name' => 'roles.index',
                'fa-name' => 'نمایش نقش ها',
                'slug' => 'show-role',
                'guard_name' => 'web',
            ]
            ,
            [
                'name' => 'roles.create',
                'fa-name' => 'افزودن نقش',
                'slug' => 'add-role',
                'guard_name' => 'web',
            ],
            [
                'name' => 'roles.update',
                'fa-name' => 'ویرایش نقش',
                'slug' => 'edit-role',
                'guard_name' => 'web',
            ],
            [
                'name' => 'roles.destroy',
                'fa-name' => 'حذف نقش',
                'slug' => 'delete-role',
                'guard_name' => 'web',
            ],
            [
                'name' => 'profile.index',
                'fa-name' => 'نمایش پروفایل',
                'slug' => 'show-profile',
                'guard_name' => 'web'
            ],
            [
                'name' => 'profile.update',
                'fa-name' => 'ویرایش پروفایل',
                'slug' => 'edit-profile',
                'guard_name' => 'web'
            ],
            [
                'name' => 'profile.destroy',
                'fa-name' => 'حذف حساب کاربری',
                'slug' => 'delete-account',
                'guard_name' => 'web'
            ]
        ]);
    }
}
