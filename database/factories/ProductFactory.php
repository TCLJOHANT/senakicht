<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    private function generarImagen()
    {
        $client = new Client();
        $response = $client->get('https://pixabay.com/api/', [
            'query' => [
                'q' => 'product',
                'key' => '32197405-8812e983959c5a943e2916bd1',
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
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        // Generar el registro
        $category = Category::where('type', 'product')->first();
        $product = Product::create([
            'name' => implode(' ', $this->faker->words(3)),
            'price' => $this->faker->randomNumber(4),
            'description' => $this->faker->paragraph(3),
            'user_id' => 8,
            'category_id' => $category->id,
        ]);

        // Agregar las 4 imágenes al registro
        // for ($i = 0; $i < 4; $i++) {
            $image = $this->generarImagen();
            $product->multimedia()->create([
                'ruta' => $image,
                'type' => 'imagen',
            ]);
        // }

        return [
            'name' => $product->name,
            'price' => $product->price,
            'description' => $product->description,
            'user_id' => $product->user_id,
            'category_id' => $product->category_id,
        ];
    }
}

