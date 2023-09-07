<?php

namespace Database\Seeders;

use App\Models\Recetas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class RecetasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Recetas::create([
            'name' => 'Cafe Delicioso Y Refrescante',
            'images' => 'di.png',
            'ingredients' => 'cafe',
            'description' => 'Nada Más Delicioso Que Disfrutar De Una Deliciosa Tacita De Café A Cualquier Hora, Puedes Estar En La Oficina O En La Casa.',
        ]);

        Recetas::create([
            'name' => 'Ajiaco',
            'images' => 'h',
            'ingredients' => 'Ajiaco',
            'description' => 'Ajiaco',
        ]);

        Recetas::create([
            'name' => 'Ajiaco',
            'images' => 'h',
            'ingredients' => 'Ajiaco',
            'description' => 'Ajiaco',
        ]);

        Recetas::create([
            'name' => 'Ajiaco',
            'images' => '',
            'ingredients' => 'cafe',
            'description' => 'gg',
        ]);

    



        
    }
}
