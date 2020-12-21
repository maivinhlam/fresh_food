<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role_id' => 1,
            'password' => 'admin',
            'phone' => '0123456789',
            'avatar' => 'none',
            'address' => 'admin',
            'remember_token' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

