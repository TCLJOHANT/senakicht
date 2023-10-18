<?php

namespace App\Livewire\Admin\Recipe;
use App\Models\Recipe;
use Livewire\Component;

class ShowRecipes extends Component
{
    public $search,$recipe,$images,$identificador;
    public $ordenar = "";
    public $direction = "desc";
    protected $paginationTheme = "bootstrap";
    public $open_edit = false;

    public $rules = [
        'recipe.name'=> 'required',
        'recipe.images'=> 'required|image|mimes:png,jpg|max:2048',
        'recipe.description'=> 'required',
        'recipe.ingredients' =>'required',
        'recipe.preparation' =>'required',
        // 'category' => 'required',
    ];
    protected $listeners = ['render'=>'render'];

    public function mount(){
        $this->identificador = rand(); //le asigna un numero al azar o random
        $this->recipe = new Recipe(); 
    }
    public function render()
    {   
        $recipes = Recipe::where('name', 'LIKE', '%' . $this->search . '%')->get();
        return view('livewire.admin.recipe.show-recipes',compact('recipes'));
    }

    public function edit(Recipe $recipe){
        $this->recipe = $recipe;
        $this->open_edit = true;
    }
}
