<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $category = Category::where('type', 'product')->first();
         Recipe::create([
             'name' => 'Cafe Agila Roja',
             'description' => 'descripcion del producto',
             'ingredients'=>'no se',
            'preparation'=>'no se',
             'user_id' => 1,
             'category_id' => $category->id
         ]);
         Recipe::create([
            'name' => 'Chocolate',
            'description' => 'descripcion del producto',
            'ingredients'=>'no se',
           'preparation'=>'no se',
            'user_id' => 1,
            'category_id' => $category->id
        ]);
        Recipe::create([
            'name' => 'queso',
            'description' => 'descripcion del producto',
            'ingredients'=>'no se',
           'preparation'=>'no se',
            'user_id' => 1,
            'category_id' => $category->id
        ]);
        Recipe::create([
            'name' => 'Cola',
            'description' => 'descripcion del producto',
            'ingredients'=>'no se',
           'preparation'=>'no se',
            'user_id' => 1,
            'category_id' => $category->id
        ]);
        Recipe::create([
            'name' => 'quesadilla',
            'description' => 'descripcion del producto',
            'ingredients'=>'no se',
           'preparation'=>'no se',
            'user_id' => 1,
            'category_id' => $category->id
        ]);
        Recipe::create([
            'name' => 'Cafe leche',
            'description' => 'descripcion del producto',
            'ingredients'=>'no se',
           'preparation'=>'no se',
            'user_id' => 1,
            'category_id' => $category->id
        ]);
        Recipe::create([
            'name' => 'Cafe negro',
            'description' => 'descripcion del producto',
            'ingredients'=>'no se',
           'preparation'=>'no se',
            'user_id' => 1,
            'category_id' => $category->id
        ]);
        
    }
}
