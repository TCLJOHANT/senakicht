<?php

namespace Database\Seeders;

use App\Models\Comentarios;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComentariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comentarios::create([
            'description' => 'Que Meloooo, Ojala Pudieran Haber Mas Paginas Asi Tan Buenas, Ojala Las Demas Paginas Puedan Tomar Ejemplo De Paginas Asi Como Estas.',
            'idUser' => 1,
        ]);

        Comentarios::create([
            'description' => 'Que Buena Web, Puedo Encontrar Todo Lo Que Busco Tanto En Recetas Como En Productos Pero Creo Que Le Falta Algo, Aun Pueden Mejorar Sigan Asi Que Bendicion.',
            'idUser' => 2,
        ]);

        Comentarios::create([
            'description' => 'Esta Muy Buena La Pagina Trae Muy Buenas Cosas Pero Le Faltan Algunos Cambios Y Optimizarla Pero De Resto Todo Bello Todo Bonito.',
            'idUser' => 3,
        ]);

        Comentarios::create([
            'description' => 'Esta Muy Buena La Pagina Trae Muy Buenas Cosas Pero Le Faltan Algunos Cambios Y Optimizarla Pero De Resto Todo Bello Todo Bonito.',
            'idUser' => 4,
        ]);

        Comentarios::create([
            'description' => 'Esta Muy Buena La Pagina Trae Muy Buenas Cosas Pero Le Faltan Algunos Cambios Y Optimizarla Pero De Resto Todo Bello Todo Bonito.',
            'idUser' => 5,
        ]);





        
    }
}
