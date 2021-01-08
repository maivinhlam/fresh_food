<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $limit = 20;
        for ($i = 1; $i < $limit; $i++) {
            DB::table('users')->insert([
                'id' => 1,
                'name' => "user$i",
                'email' => "user$i@gmail.com",
                'role_id' => 4,
                'password' => bcrypt('12312310'),
                'phone' => '0123456789',
                'remember_token' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}