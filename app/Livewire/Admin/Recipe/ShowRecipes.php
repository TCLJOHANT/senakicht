<?php

namespace App\Livewire\Admin\Recipe;

use App\Exports\RecipeExport;
use App\Models\Recipe;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use Livewire\Component;
use Livewire\WithFileUploads;
class ShowRecipes extends Component
{
    use WithPagination;
    use WithFileUploads; 
    public $search;
    public $openModal = false;
    public $name, $images,$description,$ingredients,$preparation,$identificador,$recipeId;
    public $titleModal = "Crear Receta";
    public $btnModal = "Crear";
    public $rules = [
        'name'=> 'required',
        'images'=> 'required|image|mimes:png,jpg|max:2048',
        'description'=> 'required',
        'ingredients' =>'required',
        'preparation' =>'required',
        // 'category' => 'required',
    ];


    public function mount(){
        $this->identificador = rand(); //le asigna un numero al azar o random
    }
    public function render()
    {   
        $recipes = Recipe::where('name', 'LIKE', '%' . $this->search . '%')->paginate(5);
        return view('livewire.admin.recipe.show-recipes',compact('recipes'));
    }


    public function abrirModal(){
        $this->reset(['openModal','name','images','description','ingredients','preparation','btnModal','titleModal']);
        $this->identificador = rand(); //le asigna un numero al azar o random (se hace para que input file cambie y no ponga el anterior)
        $this->openModal = true;
    }

    public function save(){
        $this->validate();
        $images = $this->images->store('recipes');
        Recipe::create(['name'=>$this->name,'images'=>$images, 'description'=>$this->description,'ingredients'=>$this->ingredients,'preparation'=>$this->preparation]);
        $this->reset(['openModal','name','images','description','ingredients','preparation']);
        $this->identificador = rand(); //le asigna un numero al azar o random (se hace para que input file cambie y no ponga el anterior)
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
    public function destroyRecipe(Recipe $recipe) {
        //eliminar imagen
        if($recipe->images){
            Storage::disk('public')->delete($recipe->images);
        }
        $recipe->delete();
    }
    public function modalEdit(Recipe $recipe){
        $this->recipeId = $recipe->id;
        $this->description =$recipe->description;
        $this->name =$recipe->name;
        $this->ingredients =$recipe->ingredients;
        $this->preparation =$recipe->preparation;
        $this->images =$recipe->images;
    
         $this->titleModal = "Editar Receta";
        $this->btnModal = "Actualizar";
         $this->openModal= true;
    }
    //reiniciar paginacion si se cambia la variable search
    public function updatingSearch(){
        $this->resetPage();
    }

    public function exportar(){
        $recipesExport = new RecipeExport;
        return $recipesExport->download('recipes.xlsx');
    }
}
