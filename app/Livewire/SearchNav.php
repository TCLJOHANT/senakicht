<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Recipe;
use App\Models\Product;
use App\Models\Menu;

class SearchNav extends Component
{
    public $search;

    public function render()
    {
        $recipeResults = Recipe::where('name', 'LIKE', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(5);
        $productResults = Product::where('name', 'LIKE', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(5);
        $menuResults = Menu::where('name', 'LIKE', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(5);

        $items = [
            'Recipes' => $recipeResults,
            'Products' => $productResults,
            'Menus' => $menuResults,
        ];

        return view('livewire.search-nav', compact('items'));
    }
}
