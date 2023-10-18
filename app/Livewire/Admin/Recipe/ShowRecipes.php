<?php

namespace App\Livewire\Admin\Recipe;
use App\Models\Recipe;
use Livewire\Component;

class ShowRecipes extends Component
{
    public $search;
    public $ordenar = "";
    public $direction = "desc";
    protected $paginationTheme = "bootstrap";
    protected $listeners = ['render'=>'render'];
    public function render()
    {   
        $recipes = Recipe::where('name', 'LIKE', '%' . $this->search . '%')->get();
        return view('livewire.admin.recipe.show-recipes',compact('recipes'));
    }
}
