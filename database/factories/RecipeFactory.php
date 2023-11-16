<?php

namespace Database\Factories;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;
use GuzzleHttp\Client; //necesario para consumo api

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    protected $model = Recipe::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private function generarImagen()
    {
        $client = new Client();
        $response = $client->get('https://pixabay.com/api/', [
            'query' => [
                'q' => 'recipe',
                'key' => env('PIXABAY_API_KEY'),
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

    public function definition(): array
    {
        $imageUrl = $this->generarImagen();

        return [
            'name' => $this->faker->sentence(3),
            'images' => $imageUrl,
            'description' => $this->faker->paragraph(3),
            'ingredients' => $this->faker->paragraph(5),
            'preparation' => $this->faker->paragraph(5),
            'user_id' => 1,
            'category_id' => 1,
        ];
    }
}
