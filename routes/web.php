<?php

use App\Http\Controllers\CartController;
use App\Models\Cart;
use App\Http\Controllers\ComentariosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ContactanosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('home');
    
    //Opiniones
    Route::resource('/opiniones',ComentariosController::class)->names([
        'index' => 'opiniones',
        'store' => 'comentarios.store',
    ]);

    //Productos
    Route::get('/productos',[HomeController::class,'productos'])->name('productos');
    Route::get('/crudProductos', [ProductosController::class,'index']);
    Route::post('/crudProductos', [ProductosController::class,'store'])->name('productos.store');
    Route::get('/crudProductos/{productos}/editar',[ProductosController::class,'edit'])->name('productos.editar');
    Route::put('/crudProductos/{productos}/actualizar',[ProductosController::class,'update'])->name('productos.update');
    Route::delete('crudProductos/{productos}', [ProductosController::class,'destroy'])->name('productos.destroy');

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
