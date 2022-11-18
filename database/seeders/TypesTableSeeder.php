<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
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
        ];

        foreach($types as $type){
            Type::create($type);
        }
    }
}
