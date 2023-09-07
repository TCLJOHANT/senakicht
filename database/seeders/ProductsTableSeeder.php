<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

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
            'name' => 'Bandeja paisa',
            // 'slug' => 'votro-3557',
            // 'details' => '15 pulgadas, 1TB HDD, 8GB RAM',
            'price' => 12.000,
            'shipping_cost' => 19.99,
            // 'description' => 'Dell Vosro 35',
            'category_id' => 1,
            'image_path' => 'bandeja.jpg'
        ]);

        Product::create([
            'name' => 'Ajiaco',
            // 'slug' => 'iphone-1-pro',
            // 'details' => '6.1 pulgadas, 64GB 4GB RAM',
            'price' => 8.000,
            'shipping_cost' => 14.99,
            // 'description' => 'iPhone  Pro',
            'category_id' => 2,
            'image_path' => 'ajiaco.jpg'
        ]);

        Product::create([
            'name' => 'Arepas',
            // 'slug' => 'remax-610d',
            // 'details' => '6.1 pulgadas, 64GB 4GB RAM',
            'price' => 7.000,
            'shipping_cost' => 1.89,
            // 'description' => 'Remax 610D Headset',
            'category_id' => 3,
            'image_path' => 'arepa.jpg'
        ]);

        Product::create([
            'name' => 'Donas',
            // 'slug' => 'samsung-led-24',
            // 'details' => '24 pulgadas, LED Display, Resolución 1366 x 768',
            'price' => 13.000,
            'shipping_cost' => 1.59,
            // 'description' => 'Samsung LED TV',
            'category_id' => 4,
            'image_path' => 'donuts.png'
        ]);

     
        Product::create([
            'name' => 'Rollo de carne',
            // 'slug' => 'gr5-2017',
            // 'details' => '5.5 pulgadas, 32GB 4GB RAM',
            'price' => 148.99,
            'shipping_cost' => 6.79,
            // 'description' => 'Huawei GR 5 2017',
            'category_id' => 7,
            'image_path' => 'rollo.png'
        ]);

       
        Product::create([
            'name' => 'Helado',
            // 'slug' => 'grama',
            // 'details' => 'helado de fresa',
            'price' => 20.000,
            'shipping_cost' => 5.79,
            // 'description' => 'fresa',
            'category_id' => 8,
            'image_path' => 'helado.png'
        ]);
        
        Product::create([
            'name' => 'Picada',
            // 'slug' => 'pollo',
            // 'details' => 'arros de pollo',
            'price' => 20.999,
            'shipping_cost' => 4.79,
            // 'description' => 'fresa',
            'category_id' => 9,
            'image_path' => 'picada.png'
        ]);





    }
}
