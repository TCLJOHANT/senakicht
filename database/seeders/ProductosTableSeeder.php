<?php

namespace Database\Seeders;

use App\Models\Productos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Productos::create([
            'name' => 'Cafe Agila Roja',
            'price' => 7.000,
            'image' => 'cafe.png',
           
        ]);

        // Productos::create([
        //     'name' => 'Ajiaco',
        //     'price' => 12.000,
        //     'image' => 'Ajiaco',
           
        // ]);

        // Productos::create([
        //     'name' => 'Ajiaco',
        //     'price' => 12.000,
        //     'image' => 'Ajiaco',
           
        // ]);

        // Productos::create([
        //     'name' => 'Ajiaco',
        //     'price' => 12.000,
        //     'image' => 'Ajiaco',
           
        // ]);
    }
}
