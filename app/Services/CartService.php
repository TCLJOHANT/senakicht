<?php

namespace App\Services;

use App\Models\Cart;

class CartService{

    public function DatosCart(){
        

        $total = \Cart::getTotal();


         //dd($cartCollection);

         return $total;
    }
}
