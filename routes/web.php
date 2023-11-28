<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Models\Cart;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactanosController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RecipeController;
use App\Livewire\App\Comentarios;
use App\Livewire\App\Contactos;
use App\Livewire\App\Nosotros;
use App\Livewire\App\Productos;
use App\Livewire\App\Recetas;
use App\Livewire\App\Home;
use App\Livewire\App\Platos;
use Illuminate\Support\Facades\Route;


//Login Con Facebook
Route::get('authfacebook/redirect',[AuthController::class,'redirectFacebook'])->name('authfacebook.redirect');
Route::get('authfacebook/callback',[AuthController::class,'callbackFacebook'])->name('authfacebook.callback');
//Login Con Google
Route::get('authgoogle/redirect',[AuthController::class,'redirectGoogle'])->name('authgoogle.redirect');
Route::get('/google-callback',[AuthController::class,'callbackGoogle']);


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    
    Route::get('',Home::class)->name('home');    
    //Recetas
    Route::get('recetas',Recetas::class)->name('recetas');
    Route::get('/recetas/{recetas}/recetas',[HomeController::class,'ver'])->name('verRecetas');
    //Productos
    Route::get('productos',Productos::class)->name('productos');
    //Nostros
    Route::get('nosotros',Nosotros::class)->name('nosotros');
    //Contactanos
    Route::get('contactanos',Contactos::class)->name('contactos');
    //Menu
    Route::get('menu',Platos::class)->name('menu');
    //Opiniones
    Route::get('comentarios',Comentarios::class)->name('comentarios.index');
    Route::post('comentarios',[CommentController::class,'store'])->name('comentarios.store');
    Route::get('/descarga_pdf/{id}',[RecipeController::class,'pdf'])->name('recetas.pdf');
    Route::post('contactanos',[ContactanosController::class,'store'])->name('contactanos.store');
    Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
    Route::post('/add', [CartController::class, 'add'])->name('cart.store');
    Route::post('/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');
    //menu
    Route::resource('/menus',MenuController::class)->names('menus');
    //Payment
    Route::get('/paypal/pay',[PaymentController::class, 'paypalPayment'])->name('paypal');
    Route::get('/paypal/status',[PaymentController::class, 'paypalStatus']);

    Route::get('ver',[HomeController::class,'verr']);
});


