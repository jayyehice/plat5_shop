<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

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
                'name'=> 'apple',
                'description'=> '蘋果',
                'price' =>100,
                'user_is' => 1
            ],
            [
                'name'=> 'banana',
                'description'=> '香蕉',
                'price'=>50,
                'user_is' => 2
            ],
            [
                'name'=> 'cherry',
                'description'=> '櫻桃',
                'price'=>200,
                'user_is' => 1
            ],
            [
                'name'=> 'lemon',
                'description'=> '檸檬',
                'price'=>60,
                'user_is' => 2
            ],
            [
                'name'=> 'cantaloupe',
                'description'=> '香瓜',
                'price'=>300,
                'user_is' => 1
            ],
            [
                'name'=> 'peach',
                'description'=> '水蜜桃',
                'price'=>800,
                'user_is' => 2
            ]
        ];

        foreach($products as $product){
            Product::create($product);
        }
    }
}
