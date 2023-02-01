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
                'name' => 'ساخت دانش آموز جدید',
                'slug' => 'create-user',
                'guard_name' => 'web'
            ],
            [
                'name' => 'نمایش دانش آموزان',
                'slug' => 'show-students',
                'guard_name' => 'web'
            ],
            [
                'name' => 'ثبت نمره',
                'slug' => 'apply-grade',
                'guard_name' => 'web'
            ],
            [
                'name' => 'حذف دانش آموز',
                'slug' => 'remove-student',
                'guard_name' => 'web'
            ]
        ]);
    }
}
