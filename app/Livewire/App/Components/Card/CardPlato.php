<?php

namespace App\Livewire\App\Components\Card;

use App\Models\Menu;
use Livewire\Component;
class CardPlato extends Component
{
    public $plato,$openModalDetailPlato=false;
    public $images=[];
    public $currentSlide = 0;
    public $imgPlatoCard;
    public function mount(Menu $plato)
    {
        $this->plato = $plato;
        foreach($plato->multimedia as $index => $imagenes){
            if($index ===0){
                $this->imgPlatoCard = asset('storage/' . $imagenes->ruta);
            }
        }
    }
    public function render()
    {
        return view('livewire.app.components.card.card-plato');
    }

    public function prevSlide()
    {
        $this->currentSlide = ($this->currentSlide - 1 + count($this->images)) % count($this->images);
    }

    public function nextSlide()
    {
        $this->currentSlide = ($this->currentSlide + 1) % count($this->images);
    }
}
