<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Models\Cart;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactanosController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


//Login Con Facebook
Route::get('authfacebook/redirect',[AuthController::class,'redirectFacebook'])->name('authfacebook.redirect');
Route::get('authfacebook/callback',[AuthController::class,'callbackFacebook'])->name('authfacebook.callback');
//Login Con Google
Route::get('authgoogle/redirect',[AuthController::class,'redirectGoogle'])->name('authgoogle.redirect');
Route::get('/google-callback',[AuthController::class,'callbackGoogle']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('home');
    //Opiniones
    Route::resource('comentarios',CommentController::class)->names('comentarios');

    //Productos
    Route::get('/productos',[HomeController::class,'productos'])->name('productos');
    Route::post('/crudProductos', [ProductController::class,'store'])->name('productos.store');
    //Recetas
    Route::get('/recetas',[HomeController::class,'recetas'])->name('recetas');
    Route::get('/recetas/{recetas}/recetas',[HomeController::class,'ver'])->name('verRecetas');

    //Nostros
    Route::get('/nosotros',[HomeController::class,'nosotros'])->name('nosotros');

    //Contactanos
    Route::get('/contactanos',[ContactanosController::class,'contactos'])->name('contactos');
    Route::post('contactanos',[ContactanosController::class,'store'])->name('contactanos.store');

    //Menu
    Route::get('menu',[CartController::class,'shop'])->name('menu');
    Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
    Route::post('/add', [CartController::class, 'add'])->name('cart.store');
    Route::post('/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');
});


