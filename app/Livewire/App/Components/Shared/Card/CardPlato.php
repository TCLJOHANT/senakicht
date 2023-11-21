<?php

namespace App\Livewire\App\Components\Shared\Card;

use Livewire\Component;
class CardPlato extends Component
{
    public $plato,$openModalDetailPlato=false;

    public function mount($plato)
    {
        $this->plato = $plato;
    }
    public function render()
    {
        return view('livewire.app.components.shared.card.card-plato');
    }
}
