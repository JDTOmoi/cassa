<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->insert(
            ['name' => 'Test','Email' => 'test@gmail.com','password' => '12345678', 'role_id' => 1, 'is_login'=>'0', 'is_active'=>'0','remember_token'=>null]
        );
    }
}
