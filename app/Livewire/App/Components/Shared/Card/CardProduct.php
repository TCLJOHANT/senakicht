<?php

namespace App\Livewire\App\Components\Shared\Card;

use App\Models\Product;
use Livewire\Component;

class CardProduct extends Component
{
    public $product,$openModalDetailProduct=false;
   
    public $mainImage;
    public $previewImages;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->mainImage = asset('storage/' . $product->multimedia->first()->ruta);
        $this->previewImages = $product->multimedia->skip(1)->pluck('ruta');
    }
    public function render()
    {
        return view('livewire.app.components.shared.card.card-product');
    }
    public function openModalDetalle(){
        $this->openModalDetailProduct = true;
    }
    public function changeMainImage($image){        
        $this->mainImage = asset('storage/' . $image);
        $this->previewImages = $this->previewImages->filter(function ($previewImage) use ($image) {
            return $previewImage !== $image;
        });
    }
    
}
