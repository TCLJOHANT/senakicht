<?php

namespace App\Livewire\Shared;

use Livewire\Component;
use App\Models\Recipe;
use App\Models\Multimedia;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class FormRecipe extends Component
{
    use WithFileUploads; 
    public 
    $titleModal = "Crear Receta",
    $btnModal = "Crear" ,
    $openModal =false, 
    $recipe;
    public $name,$description,$ingredients,$preparation,$identificador,$recipeId;
    public $ingredientes = [],$pasos=[], $images = [];
  
    private $resetVariables = ['openModal','name','images','description','ingredients','preparation','btnModal','titleModal'];
    
    protected $listeners = ['editarRecetaForm'];
    public $rules = [
        'name'=> 'required',
        'img'=> 'required|image|mimes:png,jpg|max:2048',
        'description'=> 'required',
        'ingredients' =>'required',
        'preparation' =>'required',
        // 'category' => 'required',
    ];


    public function mount(){
        $this->identificador = rand(); //le asigna un numero al azar o random
    }
    public function editarRecetaForm(Recipe $recipe){
        $this->recipe = $recipe;
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

    public function render()
    {
        return view('livewire.shared.form-recipe');
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


    public function agregarIngrediente()
    {
        $this->ingredientes[] = ['nombre' => '', 'cantidad' => '', 'medida' => ''];
    }

    public function eliminarIngrediente($index)
    {
        unset($this->ingredientes[$index]);
        $this->ingredientes = array_values($this->ingredientes);
    }

    public function agregarPaso()
    {
        $this->pasos[] = '';
    }

    public function eliminarPaso($index)
    {
        unset($this->pasos[$index]);
        $this->pasos = array_values($this->pasos);
    }

    public function updatedImages()
    {
        // Aquí puedes realizar acciones adicionales al actualizar las imágenes, si es necesario
    }

    public function removeImage($index)
    {
        unset($this->images[$index]);
    }
}
