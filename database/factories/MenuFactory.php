<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Menu;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    private function generarImagen()
    {
        $client = new Client();
        $response = $client->get('https://pixabay.com/api/', [
            'query' => [
                'q' => 'menu',
                'key' => '32197405-8812e983959c5a943e2916bd1',
            ],
        ]);
        $imageData = json_decode($response->getBody(), true);
        $randomImageIndex = array_rand($imageData['hits']);
        $imageUrl = $imageData['hits'][$randomImageIndex]['largeImageURL'];

        // Generar un nombre único para la imagen
        $imageName = 'menu_' . uniqid() . '.jpg';

        // Descargar y guardar la imagen en tu directorio de imágenes de recetas
        $imagePath = 'public/storage/Menus/' . $imageName;
        file_put_contents($imagePath, file_get_contents($imageUrl));

        return 'Menus/' . $imageName;
    }
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Generar el registro
        $category = Category::where('type', 'recipeAndmenu')->first();
        $menu = Menu::create([
            'name' => implode(' ', $this->faker->words(3)),
            'price' => $this->faker->randomNumber(4),
            'user_id' => 8,
            'category_id' => $category->id,
        ]);
        // Agregar las 4 imágenes al registro
        // for ($i = 0; $i < 4; $i++) {
            $image = $this->generarImagen();
            $menu->multimedia()->create([
                'ruta' => $image,
                'type' => 'imagen',
            ]);
        // }

        return [
            'name' => $menu->name,
            'price' => $menu->price,
            'user_id' => $menu->user_id,
            'category_id' => $menu->category_id,
        ];
    }
}
