<?php

namespace App\Livewire\App\Pages;

use App\Models\Product;
use Livewire\Component;

class ProductsLivewire extends Component
{
    protected $listeners = ['render']; 

    public function render()
    {
        $productos = Product::all();
        return view('livewire.app.pages.products-livewire',compact('productos'));
    }
}
