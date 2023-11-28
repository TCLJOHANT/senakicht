<?php

namespace App\Livewire\App;

use Livewire\Component;
use Livewire\Attributes\Lazy;
 
#[Lazy]
class Nosotros extends Component
{
    public function render()
    {
        return view('livewire.app.nosotros');
    }
}
