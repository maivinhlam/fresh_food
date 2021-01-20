<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ProductType;
use App\Models\Brand;
use App\Models\Admin;
use App\Models\Supplier;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 30;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('products')->insert([
                'type_id' => ProductType::query()->select('id')->get()->random()->id,
                'brand_id' => Brand::query()->select('id')->get()->random()->id,
                'supplier_id' => Supplier::query()->select('id')->get()->random()->id,
                'name' => $faker->name,
                'price' => $faker->numerify('#####000'),
                'sell_percen' => $faker->numberBetween(2, 55),
                'amount' => $faker->randomNumber(4, false),
                'description' => $faker->paragraph,
                'image_path' => $faker->imageUrl(640, 480, 'food', true),
                'view_count' => $faker->randomNumber(4, false),
                'creator_id' => Admin::query()->select('id')->get()->random()->id,
                'created_at' => $faker->dateTime,
                'updated_at' => now(),
            ]);
        }
    }
}