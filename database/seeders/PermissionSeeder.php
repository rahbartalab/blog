<?php

namespace Database\Seeders;

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
            [
                'name' => 'create-user',
                'slug' => 'ساخت دانش آموز جدید',
                'guard_name' => 'web'
            ],
            [
                'name' => 'show-students',
                'slug' => 'نمایش دانش آموزان',
                'guard_name' => 'web'
            ],
            [
                'name' => 'apply-grade',
                'slug' => 'ثبت نمره',
                'guard_name' => 'web'
            ],
            [
                'name' => 'remove-student',
                'slug' => 'حذف دانش آموز',
                'guard_name' => 'web'
            ]
        ]);
    }
}
