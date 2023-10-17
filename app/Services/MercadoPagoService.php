<?php

namespace App\Services;

use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Resources\Preference;
use MercadoPago\Resources\Preference\Item;

class MercadoPagoService{

    public function crearPreferece(){

        MercadoPagoConfig::setAccessToken(config('services.mercadopago.token'));

        $client = new PreferenceClient();
        $preference = $client->create([
            "items" => array(
                array(
                    "title" => "Meu produto",
                    "quantity" => 1,
                    "currency_id" => "BRL",
                    "unit_price" => 100
                )
            )
        ]);

        return $preference; 

    }

}
