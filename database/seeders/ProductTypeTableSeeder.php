<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_type')->insert([
            [
                'product_id'=> '1',
                'type_id'=> '1',
            ],
            [
                'product_id'=> '1',
                'type_id'=> '4',
            ],
            [
                'product_id'=> '2',
                'type_id'=> '2',
            ],
            [
                'product_id'=> '2',
                'type_id'=> '4',
            ],
            [
                'product_id'=> '3',
                'type_id'=> '1',
            ],
            [
                'product_id'=> '3',
                'type_id'=> '5',
            ],
            [
                'product_id'=> '4',
                'type_id'=> '3',
            ],
            [
                'product_id'=> '4',
                'type_id'=> '5',
            ],
            [
                'product_id'=> '5',
                'type_id'=> '3',
            ],
            [
                'product_id'=> '5',
                'type_id'=> '4',
            ],
            [
                'product_id'=> '6',
                'type_id'=> '1',
            ],
            [
                'product_id'=> '6',
                'type_id'=> '4',
            ]
        ]);
    }
}
