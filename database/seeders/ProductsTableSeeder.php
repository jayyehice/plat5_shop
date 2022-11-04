<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name'=> 'apple',
                'description'=> '蘋果',
                'price'=>100
            ],
            [
                'name'=> 'banana',
                'description'=> '香蕉',
                'price'=>50
            ],
            [
                'name'=> 'cherry',
                'description'=> '櫻桃',
                'price'=>200
            ],
        ]);
    }
}
