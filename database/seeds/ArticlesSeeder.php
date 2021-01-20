<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Product;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $limit = 30;

        for ($i = 1; $i <= $limit; $i++) {
            DB::table('articles')->insert([
                'product_id'    => $i ,
                'title'         => "",
                'content'       => "",
            ]);
        }
    }
}