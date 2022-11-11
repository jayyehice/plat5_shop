<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            [
                'name'=> '紅色',
                'kind'=> '顏色'
            ],
            [
                'name'=> '黃色',
                'kind'=> '顏色'
            ],
            [
                'name'=> '綠色',
                'kind'=> '顏色'
            ],
            [
                'name'=> '甜',
                'kind'=> '口味'
            ],
            [
                'name'=> '酸',
                'kind'=> '口味'
            ]
        ]);
    }
}
