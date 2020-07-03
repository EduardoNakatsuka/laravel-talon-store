<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
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
                'name' => 'Lapis',
                'price' => rand(0, 1000),
                'description' => 'muito bom',
            ],
            [
                'name' => 'Carro',
                'price' => rand(0, 1000),
                'description' => 'fumando um poco',
            ],
            [
                'name' => 'Casa em paris',
                'price' => rand(0, 1000),
                'description' => 'Bem romantica',
            ],
            [
                'name' => 'Copo de cachaça',
                'price' => rand(0, 1000),
                'description' => 'aguardente velho barreiro',
            ],
            [
                'name' => 'Xiaomi',
                'price' => rand(0, 1000),
                'description' => 'Melhor que apple?',
            ],
        ]);
    }
}
