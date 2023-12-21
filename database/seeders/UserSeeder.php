<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->insert(
            ['name' => 'Test','Email' => 'test@gmail.com','password' => bcrypt('12345678'), 'role_id' => 2, 'is_login'=>'0', 'is_active'=>'1','remember_token'=>null]
        );
    }
}
