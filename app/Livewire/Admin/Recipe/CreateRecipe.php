<?php

namespace App\Livewire\Admin\Recipe;

use Livewire\Component;
use App\Models\Recipe;
use Livewire\WithFileUploads;
class CreateRecipe extends Component
{
    use WithFileUploads; 
    public $open = false;
    public $name, $images,$description,$ingredients,$preparation,$identificador;
    public function mount(){
        $this->identificador = rand(); //le asigna un numero al azar o random
    }
    public $rules = [
        'name'=> 'required',
        'images'=> 'required|image|mimes:png,jpg|max:2048',
        'description'=> 'required',
        'ingredients' =>'required',
        'preparation' =>'required',
        // 'category' => 'required',
    ];
    public function save(){
        $this->validate();
        $images = $this->images->store('recipes');
        Recipe::create(['name'=>$this->name,'images'=>$images, 'description'=>$this->description,'ingredients'=>$this->ingredients,'preparation'=>$this->preparation]);
        $this->reset(['open','name','images','description','ingredients','preparation']);
        $this->identificador = rand(); //le asigna un numero al azar o random (se hace para que input file cambie y no ponga el anterior)
        // emitir
        $this->dispatch('render')->to(ShowRecipes::class);

    }
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.admin.recipe.create-recipe');
    }

}
