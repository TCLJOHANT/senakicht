<?php

namespace App\Livewire\App;

use App\Models\Menu;
use Livewire\Component;

class Platos extends Component
{
    
    protected $listeners = ['render']; 
    public function render()
    {
        $platos = Menu::all();;
        return view('livewire.app.platos',compact('platos'));
    }
}
