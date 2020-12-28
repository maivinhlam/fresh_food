<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert([
            'id' => 1,
            'name' => 'None',
            'tel' => '',
            'address' => '',
            'fax' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}