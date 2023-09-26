<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::create([
            'description' => 'Que Meloooo, Ojala Pudieran Haber Mas Paginas Asi Tan Buenas, Ojala Las Demas Paginas Puedan Tomar Ejemplo De Paginas Asi Como Estas.',
            'user_id' => 1,
        ]);

        Comment::create([
            'description' => 'Que Buena Web, Puedo Encontrar Todo Lo Que Busco Tanto En Recetas Como En Productos Pero Creo Que Le Falta Algo, Aun Pueden Mejorar Sigan Asi Que Bendicion.',
            'user_id' => 2,
        ]);

        Comment::create([
            'description' => 'Esta Muy Buena La Pagina Trae Muy Buenas Cosas Pero Le Faltan Algunos Cambios Y Optimizarla Pero De Resto Todo Bello Todo Bonito.',
            'user_id' => 3,
        ]);

        Comment::create([
            'description' => 'Esta Muy Buena La Pagina Trae Muy Buenas Cosas Pero Le Faltan Algunos Cambios Y Optimizarla Pero De Resto Todo Bello Todo Bonito.',
            'user_id' => 4,
        ]);

        Comment::create([
            'description' => 'Esta Muy Buena La Pagina Trae Muy Buenas Cosas Pero Le Faltan Algunos Cambios Y Optimizarla Pero De Resto Todo Bello Todo Bonito.',
            'user_id' => 5,
        ]);





        
    }
}
