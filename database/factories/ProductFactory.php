<?php

namespace Database\Factories;

use App\Models\Category;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
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
                'q' => 'product',
                'key' => env('PIXABAY_API_KEY'),
            ],
        ]);
        $imageData = json_decode($response->getBody(), true);
        $randomImageIndex = array_rand($imageData['hits']);
        $imageUrl = $imageData['hits'][$randomImageIndex]['largeImageURL'];

        // Generar un nombre único para la imagen
        $imageName = 'product_' . uniqid() . '.jpg';

        // Descargar y guardar la imagen en tu directorio de imágenes de recetas
        $imagePath = 'public/storage/products/' . $imageName;
        file_put_contents($imagePath, file_get_contents($imageUrl));

        return 'products/' . $imageName;
    }

    public function definition(): array
    {
        $image = $this->generarImagen();
        $category = Category::where('type', 'product')->first();
        return [
            'name' => implode(' ', $this->faker->words(3)),// generará una lista de 3 palabras aleatorias, y luego utilizamos  implode()  para unir las palabras con un espacio y obtener una cadena de texto. 
            'price' =>  $this->faker->randomNumber(4),
            'image' => $image,
            'description' => $this->faker->paragraph(3),
            'user_id' => 8,
            'category_id'=>$category->id,
        ];
    }
}
