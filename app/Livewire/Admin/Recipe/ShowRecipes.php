<?php

namespace App\Livewire\Admin\Recipe;

use App\Exports\RecipeExport;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;
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
    public $titleModal = "Crear Receta", $btnModal = "Crear";
    public $rules = [
        'name'=> 'required',
        'images'=> 'required|image|mimes:png,jpg|max:2048',
        'description'=> 'required',
        'ingredients' =>'required',
        'preparation' =>'required',
        // 'category' => 'required',
    ];

    private $resetVariables = ['openModal','name','images','description','ingredients','preparation','btnModal','titleModal'];

    public function mount(){
        $this->identificador = rand(); //le asigna un numero al azar o random
    }
    public function render()
    {   
        $recipes = Recipe::where('name', 'LIKE', '%' . $this->search . '%')->paginate(5);
        return view('livewire.admin.recipe.show-recipes',compact('recipes'));
    }


    public function abrirModal(){
        $this->reset($this->resetVariables);
        $this->identificador = rand(); //le asigna un numero al azar o random (se hace para que input file cambie y no ponga el anterior)
        $this->openModal = true;
    }

    public function save(){
        $images = $this->images->store('recipes');
        $userAuth = Auth::user()->id;
        $recipe = [
            'name'=>$this->name,
            'images'=>$images,
            'description'=>$this->description,
            'ingredients'=>$this->ingredients,
            'preparation'=>$this->preparation,
            'user_id'=> $userAuth
        ];
        if($this->btnModal=="Crear"){ 
            $this->validate();
            Recipe::create($recipe);
            $this->reset($this->resetVariables);
            $this->identificador = rand(); //le asigna un numero al azar o random (se hace para que input file cambie y no ponga el anterior)
        }
        elseif($this->btnModal=="Actualizar") { 
            $recipeEdit = Recipe::find($this->recipeId); 
            Storage::disk('public')->delete($recipeEdit->images); // Eliminar la imagen antigua
            if($recipeEdit) {
                $recipeEdit->update($recipe);
                $this->reset($this->resetVariables);
                $this->identificador = rand(); 
            }
        }
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
    public function destroyRecipe(Recipe $recipe) {
        //eliminar imagen
        if($recipe->images){Storage::disk('public')->delete($recipe->images);}
        $recipe->delete();
        $this->resetPage();
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
