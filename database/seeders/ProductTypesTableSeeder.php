<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_types = [
            [
                'product_id' => 1,
                'types_id' => [1, 4]
            ],
            [
                'product_id' => 2,
                'types_id' => [2, 4]
            ],
            [
                'product_id' => 3,
                'types_id' => [1, 5]
            ],
            [
                'product_id' => 4,
                'types_id' => [2, 5]
            ],
            [
                'product_id' => 5,
                'types_id' => [3, 4]
            ],
            [
                'product_id' => 6,
                'types_id' => [1, 4]
            ]
        ];

        foreach($product_types as $product_type){
            Product::find($product_type['product_id'])->types()->attach($product_type['types_id']);
        }
    }
}
