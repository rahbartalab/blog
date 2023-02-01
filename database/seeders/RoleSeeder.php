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
                'name' => 'admin',
                'slug' => 'ادمین',
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'manager',
                'slug' => 'مدیر',
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
            ], [
                'name' => 'teacher',
                'slug' => 'معلم',
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'student',
                'slug' => 'دانش آموز',
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}

