<?php

namespace App\Livewire\Admin\Recipe;

use App\Exports\RecipeExport;
use App\Models\Multimedia;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use Livewire\Component;
use Livewire\WithFileUploads;
use Svg\Tag\Rect;

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
        if (auth()->user()->hasRole('Admin')) {
            $recipes = Recipe::where('name', 'LIKE', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(5);
        }
        elseif (auth()->user()->hasRole('Aprendiz')) {
            $recipes = Recipe::where('user_id', auth()->user()->id)
                          ->where(function ($query) {
                              $query->where('name', 'LIKE', '%' . $this->search . '%');
                          })
                          ->paginate(5);
        }
        return view('livewire.admin.recipe.show-recipes',compact('recipes'));
    }


    public function abrirModal(){
        $this->reset($this->resetVariables);
        $this->identificador = rand(); //le asigna un numero al azar o random (se hace para que input file cambie y no ponga el anterior)
        $this->openModal = true;
    }

    public function createOrUpdate()
    {
        $recipe = [
            'name' => $this->name,
            'description' => $this->description,
            'ingredients' => $this->ingredients,
            'preparation' => $this->preparation,
            'user_id' => ""
        ];
        
        if ($this->btnModal == "Crear") {
            $this->validate();
            
            $recipe['user_id'] = Auth::user()->id;
            $recipeModel = Recipe::create($recipe);
            
            foreach ($this->images as $image) {
                $path = $image->store('recipes');
                
                $multimedia = new Multimedia();
                $multimedia->ruta = $path;
                $multimedia->tipo = 'imagen';
                $recipeModel->multimedia()->save($multimedia);
            }
            
            $this->reset($this->resetVariables);
            $this->identificador = rand();
        } elseif ($this->btnModal == "Actualizar") {
            $recipeEdit = Recipe::find($this->recipeId);
            
            if ($recipeEdit) {
                $recipe['user_id'] = $recipeEdit->user_id;
                $recipeEdit->update($recipe);
                
                $recipeEdit->multimedia()->delete(); // Eliminar todas las imágenes existentes
                
                foreach ($this->images as $image) {
                    $path = $image->store('recipes');
                    
                    $multimedia = new Multimedia();
                    $multimedia->ruta = $path;
                    $multimedia->tipo = 'imagen';
                    
                    $recipeEdit->multimedia()->save($multimedia);
                }
                
                $this->reset($this->resetVariables);
                $this->identificador = rand();
            }
        }
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
    public function destroyRecipe(Recipe $recipe) {
         // Eliminar imagen
        foreach ($recipe->multimedia as $multimedia) {
            if ($multimedia->tipo === 'imagen') {
                Storage::disk('public')->delete($multimedia->ruta);
            }
        }
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
