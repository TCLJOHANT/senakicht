<?php

namespace App\Livewire\App\Components\Shared\Card;

use Livewire\Component;

class CardProduct extends Component
{
    public $product,$openModalDetailProduct=false;

    public function mount($product)
    {
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.app.components.shared.card.card-product');
    }
    public function openModalDetalle(){
        $this->openModalDetailProduct = true;
    }
}
