<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('products')->insert([
                'name' => 'Product ' . $i,
                'category_id' => rand(1,10),
                'description' => 'Description for Product ' . $i,
                'ingredients' => 'Ingredients for Product ' . $i,
                'howtouse' => 'How to use Product ' . $i,
                'dose' => 'Dose for Product ' . $i,
                'sideeffects' => 'Side effects for Product ' . $i,
                'price' => rand(10, 100) * 1000,
                'image' => 'Product' . $i . '.svg',
            ]);
        }
    }
}
