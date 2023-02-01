<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'ادمین',
                'slug' => 'admin',
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'مدیر',
                'slug' => 'role',
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
            ], [
                'name' => 'معلم',
                'slug' => 'teacher',
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'دانش آموز',
                'slug' => 'student',
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}

