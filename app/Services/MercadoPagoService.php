<?php

namespace App\Services;

use MercadoPago\Client\MerchantOrder\MerchantOrderClient;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\SDK;
use MercadoPago\Resources\Preference as Preference;
use MercadoPago\Resources\Preference\Item as Item;
use MercadoPago;



class MercadoPagoService{


    public function __construct(
        private CartService $cartService,
       
    ){ }

   

    public function crearPreferece(){

      MercadoPagoConfig::setAccessToken(config('services.mercadopago.token'));

      $cart = $this->cartService->DatosCart();

    $preference = new Preference();

    $items = [];
    foreach ($cart as $product) {
      // Crea un nuevo item
      $item = new Item();
      $item->title = "MEU";
      $item->quantity = $product->quantity;
      $item->currency_id = "BRL";
      $item->unit_price = $product->price;

      // Agrega el item al array
      $items[] = $item;
    }
   
    $preference->items = $items;
    $preference->external_reference = $product->id;
   


  
   






    dd( $preference);
     
   
   
    



  }

}
