<?php
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_types')->insert([
            'id' => 1,
            'name' => 'Other',
            'description' => 'Other Type',
            'image_path' => '',
            'product_count' => 0,
            'creator_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
