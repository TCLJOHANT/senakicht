<?php

namespace App\Livewire\App;

use Livewire\Component;

class NavBar extends Component
{
    public $openModalAuth = false, $identificador;
    public function render()
    {
        return view('livewire.app.nav-bar');
    }
    public function abrirModalAuth(){
        // $this->reset($this->resetVariables);
        $this->identificador = rand(); //le asigna un numero al azar o random (se hace para que input file cambie y no ponga el anterior)
        $this->openModalAuth = true;
    }
}
