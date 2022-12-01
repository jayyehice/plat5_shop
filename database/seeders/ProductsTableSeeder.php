<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();

        $products = [
            [
                'name' => 'apple',
                'description' => '蘋果',
                'price' => 100,
            ],
            [
                'name' => 'banana',
                'description' => '香蕉',
                'price' => 50,
            ],
            [
                'name' => 'cherry',
                'description' => '櫻桃',
                'price' => 200,
            ],
            [
                'name' => 'lemon',
                'description' => '檸檬',
                'price' => 60,
            ],
            [
                'name' => 'cantaloupe',
                'description' => '香瓜',
                'price' => 300,
            ],
            [
                'name' => 'peach',
                'description' => '水蜜桃',
                'price' => 800,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
