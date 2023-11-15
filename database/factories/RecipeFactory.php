<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Multimedia;
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
        // Generar el registro
        $category = Category::where('type', 'recipeAndMenu')->first();
        $recipe = Recipe::create([
            'name' => implode(' ', $this->faker->words(3)),
            'description' => $this->faker->paragraph(3),
            'ingredients' => $this->faker->paragraph(5),
            'preparation' => $this->faker->paragraph(5),
            'user_id' => 2,
            'category_id' => $category->id,
        ]);

        // Agregar las 4 imágenes al registro
        for ($i = 0; $i < 4; $i++) {
            $image = $this->generarImagen();
            $recipe->multimedia()->create([
                'ruta' => $image,
                'type' => 'imagen',
            ]);
        }

        return [
            'name' => $recipe->name,
            'description' => $recipe->description,
            'ingredients' => $recipe->ingredients,
            'preparation' => $recipe->preparation,
            'user_id' => $recipe->user_id,
            'category_id' => $recipe->category_id,
        ];
    }
}
