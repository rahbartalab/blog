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
            ,
            /* --!> category <!-- */
            [
                'name' => 'categories.index',
                'fa-name' => 'نمایش دسته بندی ها',
                'slug' => 'show-categories',
                'guard_name' => 'web',
            ]
            ,
            [
                'name' => 'categories.create',
                'fa-name' => 'افزودن دسته بندی',
                'slug' => 'add-category',
                'guard_name' => 'web',
            ],
            [
                'name' => 'categories.update',
                'fa-name' => 'ویرایش دسته بندی',
                'slug' => 'edit-category',
                'guard_name' => 'web',
            ],
            [
                'name' => 'categories.destroy',
                'fa-name' => 'حذف دسته بندی',
                'slug' => 'delete-category',
                'guard_name' => 'web',
            ]
            ,
            /* --!> posts <!-- */
            [
                'name' => 'posts.create',
                'fa-name' => 'افزودن پست',
                'slug' => 'add-post',
                'guard_name' => 'web'
            ],
            [
                'name' => 'posts.index',
                'fa-name' => 'نمایش پست ها',
                'slug' => 'show-post',
                'guard_name' => 'web'
            ],
            [
                'name' => 'posts.update',
                'fa-name' => 'ویرایش پست ها',
                'slug' => 'edit-posts',
                'guard_name' => 'web'
            ],
            [
                'name' => 'posts.destroy',
                'fa-name' => 'حذف پست ها',
                'slug' => 'delete-my-posts',
                'guard_name' => 'web'
            ],
            /* --!> comments <!-- */
            [
                'name' => 'comments.create',
                'fa-name' => 'افزودن کامنت',
                'slug' => 'add-comment',
                'guard_name' => 'web'
            ],
            [
                'name' => 'comments.index',
                'fa-name' => 'نمایش کامنت ها',
                'slug' => 'show-comments',
                'guard_name' => 'web'
            ],
            [
                'name' => 'comments.update',
                'fa-name' => 'ویرایش کامنت ها',
                'slug' => 'edit-comments',
                'guard_name' => 'web'
            ],
            [
                'name' => 'comments.delete',
                'fa-name' => 'حذف کامنت ها',
                'slug' => 'delete-comments',
                'guard_name' => 'web'
            ],
            /* --!> tags <!-- */
            [
                'name' => 'tags.create',
                'fa-name' => 'افزودن تگ',
                'slug' => 'add-tag',
                'guard_name' => 'web'
            ],
            [
                'name' => 'tags.index',
                'fa-name' => 'نمایش تگ ها',
                'slug' => 'show-tags',
                'guard_name' => 'web'
            ],
            [
                'name' => 'tags.update',
                'fa-name' => 'ویرایش تگ ها',
                'slug' => 'edit-tags',
                'guard_name' => 'web'
            ],
            [
                'name' => 'tags.delete',
                'fa-name' => 'حذف تگ ها',
                'slug' => 'delete-tags',
                'guard_name' => 'web'
            ],
        ]);
    }
}
