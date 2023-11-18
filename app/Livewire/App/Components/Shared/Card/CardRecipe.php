<?php

namespace App\Livewire\App\Components\Shared\Card;

use Livewire\Component;

class CardRecipe extends Component
{
    public $recipe,$openModalDetailRecipe=false;

    public function mount($recipe)
    {
        $this->recipe = $recipe;
    }
    public function render()
    {
        return view('livewire.app.components.shared.card.card-recipe');
    }
}
