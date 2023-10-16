<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Menu;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;

class CartController extends Controller
{
    public function shop()
    {
        $products = Menu::all();
       //dd($products);
        return view('home.menu')->with(['products' => $products]);
    }

    public function cart()  {
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
        $cartCollection = \Cart::getContent();
      
        return view('cart',compact('cartCollection', 'preference'));
    }
    
    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
    }

    public function add(Request$request){
        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->img,
                'slug' => $request->slug
            )
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Item Agregado a sú Carrito!');
    }

    public function update(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Cart is Updated!');
    }

    public function clear(){
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Car is cleared!');
    }

    public function mercadoPago(){
       
     
        return view('cart', compact('preference'));
        
    }

 

}
