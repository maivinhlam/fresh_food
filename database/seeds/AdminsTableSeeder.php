<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'id' => 1,
                'name' => 'systemadmin',
                'email' => 'systemadmin@gmail.com',
                'role_id' => 1,
                'password' => bcrypt('12312310'),
                'phone' => '0123456789',
                'remember_token' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'role_id' => 2,
                'password' => bcrypt('12312310'),
                'phone' => '0123456787',
                'remember_token' => '',
                'created_at' => now(),
                'updated_at' => now()

            ],
            [
                'id' => 3,
                'name' => 'editor',
                'email' => 'editor@gmail.com',
                'role_id' => 3,
                'password' => bcrypt('12312310'),
                'phone' => '0123456788',
                'remember_token' => '',
                'created_at' => now(),
                'updated_at' => now()

            ]
        ]);
    }
}