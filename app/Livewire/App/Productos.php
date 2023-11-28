<?php

namespace App\Livewire\App;

use App\Models\Product;
use Livewire\Component;

class Productos extends Component
{
    protected $listeners = ['render']; 

    public function render()
    {
        $productos = Product::all();
        return view('livewire.app.productos',compact('productos'));
    }
}
