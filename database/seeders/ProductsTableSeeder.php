<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Productos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        Product::create([
            'name' => 'Cafe Agila Roja',
            'price' => 7.000,
            'image' => 'cafe.png',
            'user_id' => 1,
        ]);

        Product::create([
             'name' => 'Ajiaco',
             'price' => 12.000,
             'image' => 'Ajiaco',
             'user_id' => 2,
        ]);

        Product::create([
             'name' => 'Harina',
             'price' => 123.000,
             'image' => 'harina.jpg',
             'user_id' =>3,
         ]);

    }
}
