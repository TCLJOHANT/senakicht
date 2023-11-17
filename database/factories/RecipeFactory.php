<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Ingredient;
use App\Models\PreparationStep;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;
use GuzzleHttp\Client; //necesario para consumo api

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    protected $model = Recipe::class;

    private function generarImagen()
    {
        $client = new Client();
        $response = $client->get('https://pixabay.com/api/', [
           'query' => [
               'q' => 'recipe',
               'key' => '32197405-8812e983959c5a943e2916bd1',
           ],
        ]);
        $imageData = json_decode($response->getBody(), true);
        $randomImageIndex = array_rand($imageData['hits']);
        $imageUrl = $imageData['hits'][$randomImageIndex]['largeImageURL'];

        // Generar un nombre único para la imagen
       $imageName = 'receta_' . uniqid() . '.jpg';

        // Descargar y guardar la imagen en tu directorio de imágenes de recetas
        $imagePath = 'public/storage/recipes/' . $imageName;
        file_put_contents($imagePath, file_get_contents($imageUrl));

        return 'recipes/' . $imageName;
       }
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category = Category::where('type','recipeAndMenu')->first();
        $recipeAttributes = ([
            'name' => implode(' ', $this->faker->words(3)),
            'description' => $this->faker->paragraph(3),
            'difficulty' => $this->faker->randomElement(['Fácil', 'Medio', 'Difícil']), // Aleatorio
            'preparation_time' => $this->faker->time(), // Aleatorio
            'user_id' => 1,
            'category_id' => $category->id,
        ]);
        $recipe = new Recipe($recipeAttributes);
        $recipe->save();
        
        // Obtener el ID de la receta después de insertarla en la base de datos
        $recipeId = $recipe->id;

        // Agregar las imágenes al registro asociadas a la receta
        // for ($i = 0; $i < 2; $i++) {
            $image = $this->generarImagen();
            $recipe->multimedia()->create([
                'ruta' => $image,
                'type' => 'imagen',
                'multimediaable_id' => $recipeId,
            ]);
        // }

        // Agregar  4 ingredientes y al registro
        for ($i = 0; $i < 4; $i++) {
            $ingredient = Ingredient::firstOrCreate([
                'name' => implode(' ', $this->faker->words(2)),
                'categoria' =>  $this->faker->randomElement(['Cereal', 'Carne', 'Lacteo','Verdura']),
            ]);
            // Asociar ingredientes a la receta mediante la tabla pivot
            $recipe->ingredients()->attach($ingredient->id, [
                'quantity' => '1',
                'unit' => $this->faker->randomElement(['Cucharada', 'Taza', 'libra','litro','kilogramo']),
                'measurement' => '250 ml',
            ]);
            //pasos de la receta
            PreparationStep::create([
                'recipe_id' => $recipe->id,
                'step_Number' => $i+1,
                'description_step' =>$this->faker->paragraph(2),
            ]);
        }
        // Ahora, después de haber definido todo, insertar la receta en la base de datos
        return $recipeAttributes;
    }
}
