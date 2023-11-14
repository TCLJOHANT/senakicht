<?php

namespace App\Services;

use App\Models\Cart;

class CartService{
       
 


    public function DatosCart()
    {
        // Obtén todos los elementos del carrito
        $cartItems = \Cart::getContent();

        return $cartItems;
    }

 
    public function ClearCart()
    {
        \Cart::clear();
    }
  


    public function PreciCart(){
        

        $total = \Cart::getTotal();

         return $total;
    }

   
}
