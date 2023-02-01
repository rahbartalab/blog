<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
//            [
//                'name' => 'create-user',
//                'slug' => 'ساخت دانش آموز جدید',
//                'guard_name' => 'web',
//                'created_at' => Carbon::now(),
//            ],
//            [
//                'name' => 'show-students',
//                'slug' => 'نمایش دانش آموزان',
//                'guard_name' => 'web',
//                'created_at' => Carbon::now(),
//            ],
//            [
//                'name' => 'apply-grade',
//                'slug' => 'ثبت نمره',
//                'guard_name' => 'web',
//                'created_at' => Carbon::now(),
//            ],
//            [
//                'name' => 'remove-student',
//                'slug' => 'حذف دانش آموز',
//                'guard_name' => 'web',
//                'created_at' => Carbon::now(),
//            ]
            [
                'name' => 'show-role',
                'slug' => 'نمایش مدیران',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ]
            ,
            [
                'name' => 'add-role',
                'slug' => 'افزودن مدیر',
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'edit-role',
                'slug' => 'ویرایش مدیر',
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'delete-role',
                'slug' => 'حذف مدیر',
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
            ]
        ]);
    }
}
