<?php

namespace App\Livewire\App\Components\Shared\Card;
use App\Models\Product;
use Livewire\Component;

 class CardProduct extends Component
{
    public $product,$openModalDetailProduct=false;
   
    public $mainImage;
    public $previewImages;

//     public function mount(Product $product)
//     {
//         $this->product = $product;
//         $this->mainImage = asset('storage/' . $product->multimedia->first()->ruta);
//         $this->previewImages = $product->multimedia->skip(1)->pluck('ruta');
//     }

//     public function openModalDetalle(){
//         $this->openModalDetailProduct = true;
//     }
//     public function changeMainImage($image){        
//         $this->mainImage = asset('storage/' . $image);
//         $this->previewImages = $this->previewImages->filter(function ($previewImage) use ($image) {
//             return $previewImage !== $image;
//         });
//     }
    
// }


 

    public function mount(Product $product)
    {
        $this->product = $product;

        // Null check before accessing multimedia
        if ($product->multimedia->isNotEmpty()) {
            $this->mainImage = asset('storage/' . $product->multimedia->first()->ruta);

            // Null check before accessing multimedia and skip(1)
            $this->previewImages = $product->multimedia->count() > 1
                ? $product->multimedia->skip(1)->pluck('ruta')
                : [];
        } else {
            $this->mainImage = asset('path/to/default/image.jpg'); // Provide a default image path
            $this->previewImages = [];
        }
    }

    public function render()
    {
        return view('livewire.app.components.shared.card.card-product');
    }

    public function openModalDetalle()
    {
        $this->openModalDetailProduct = true;
    }

    public function changeMainImage($image)
    {
        $this->mainImage = asset('storage/' . $image);

        // Null check before filtering
        if ($this->previewImages) {
            $this->previewImages = $this->previewImages->filter(function ($previewImage) use ($image) {
                return $previewImage !== $image;
            });
        }
    }
}