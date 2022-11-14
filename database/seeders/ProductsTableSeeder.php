<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Type;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'information' => [
                    'name'=> 'apple',
                    'description'=> '蘋果',
                    'price'=>100
                ],
                'types' => [1, 4]
            ],
            [
                'information' => [
                    'name'=> 'banana',
                    'description'=> '香蕉',
                    'price'=>50
                ],
                'types' => [2, 4]
            ],
            [
                'information' => [
                    'name'=> 'cherry',
                    'description'=> '櫻桃',
                    'price'=>200
                ],
                'types' => [1, 5]
            ],
            [
                'information' => [
                    'name'=> 'lemon',
                    'description'=> '檸檬',
                    'price'=>60
                ],
                'types' => [2, 5]
            ],
            [
                'information' => [
                    'name'=> 'cantaloupe',
                    'description'=> '香瓜',
                    'price'=>300
                ],
                'types' => [3, 4]
            ],
            [
                'information' => [
                    'name'=> 'peach',
                    'description'=> '水蜜桃',
                    'price'=>800
                ],
                'types' => [1, 4]
            ]
        ];

        foreach($products as $product){
            Product::create($product['information'])->types()->attach($product['types']);
        }
    }
}
