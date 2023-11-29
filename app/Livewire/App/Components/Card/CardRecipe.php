<?php

namespace App\Livewire\App\Components\Card;

use Livewire\Component;

class CardRecipe extends Component
{
    public $recipe,$openModalDetailRecipe=false,$imgRecipeCard; 

    public function mount($recipe)
    {
        $this->recipe = $recipe;
        $this->imgRecipeCard = asset('storage/' . $recipe->multimedia->first()->ruta);
    }
    public function render()
    {
        return view('livewire.app.components.card.card-recipe');
    }
}
