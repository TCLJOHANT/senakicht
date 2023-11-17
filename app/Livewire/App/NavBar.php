<?php

namespace App\Livewire\App;

use App\Models\Ingredient;
use App\Models\Recipe;
use Livewire\Component;

class NavBar extends Component
{
    public $openModalAuth = false, $identificador;
    public function render()
    {
        return view('livewire.app.nav-bar');
    }
    public function abrirModalAuth(){
        // $this->reset($this->resetVariables);
        $this->identificador = rand(); //le asigna un numero al azar o random (se hace para que input file cambie y no ponga el anterior)
        $this->openModalAuth = true;
    }
    public function prueba (){
    
        // // $recipe->ingredients = [
        // //     ['name' => 'casas', 'quantity' => '1 cup', 'unit_of_measurement' => 'kg', 'category' => 'Dulces'],
        // //     ['name' => 'laca', 'quantity' => '1 cup', 'unit_of_measurement' => 'gramo',  'category' => 'Dulces'],
        // //     ['name' => 'Pollo', 'quantity' => '2 cup', 'unit_of_measurement' => 'kg',  'category' => 'Carnes'],
        // // ];
        // $recipe->save();
        
        // // $ingredient = Ingredient::findOrFail('Pollo');
        // // $ingredient->quantity = '2 cup';
        // // $ingredient->unit_of_measurement = 'kg';
        // // $ingredient->save();
        
        $recipe = new Recipe();
$recipe->name = 'Arroz loco';
$recipe->description = 'Chocolate Cake';
$recipe->preparation = 'Chocolate Cake';
$ingredients = [
                "nombre" => "Cocoa powder",
                "cantidad"=> "1/2 cup",
                "unidad"=> "cup",
                "medida"=> "gramos",
                "categoria"=> "Dulces"
        ];
        $recipe->ingredients()->attach($ingredients);
        $recipe->save(); 
    }
}
