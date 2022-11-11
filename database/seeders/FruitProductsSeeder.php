<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FruitProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ProductsTableSeeder::class,
            TypesTableSeeder::class,
            ProductTypeTableSeeder::class,
        ]);
    }
}
