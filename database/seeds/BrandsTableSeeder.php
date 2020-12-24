<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            'id' => 1,
            'name' => 'None',
            'description' => 'None',
            'image_path' => '',
            'product_count' => 0,
            'creator_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
