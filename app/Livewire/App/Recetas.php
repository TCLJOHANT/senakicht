<?php

namespace App\Livewire\App;

use App\Models\Recipe;
use Livewire\Component;

class Recetas extends Component
{
    protected $listeners = ['render']; 
    public function render()
    {
        $recetas = Recipe::with('multimedia','ingredients','preparationSteps','comments')->get();
        return view('livewire.app.recetas',compact('recetas'));
    }
}
