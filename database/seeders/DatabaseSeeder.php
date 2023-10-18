<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Storage::deleteDirectory('recipes'); //eliminar carpeta cuado se hace mifrate fresh o refresh si existiese
        Storage::makeDirectory('recipes'); //crea carpeta recipes en public/storage
        // \App\Models\User::factory()->create([
            //     'name' => 'Test User',
            //     'email' => 'test@example.com',
            // ]);
            $this->call([
                RoleSeeder::class,
                UsersTableSeeder::class,
                CategoriesSeeder::class,
                MenusTableSeeder::class,
                ProductsTableSeeder::class ,
                RecipesTableSeeder::class,
                CommentsTableSeeder::class,
            ]);
            \App\Models\Recipe::factory(20)->create();
    }
}
