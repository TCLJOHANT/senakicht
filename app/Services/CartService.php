<?php

namespace App\Services;

use App\Models\Cart;

class CartService{

    public function DatosCart(){
        

        $cartCollection = \Cart::getContent();


         //dd($cartCollection);

         return $cartCollection;
    }
}
