<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RecipeController;
use App\Http\Controllers\Admin\UserController;
use App\Livewire\ShowItem;
use Illuminate\Support\Facades\Route;

Route::get('',[HomeController::class,'index'])->name('admin.home');
Route::resource('users',UserController::class)->names('admin.users'); 
Route::resource('products',ProductController::class)->names('admin.products');
Route::resource('recipes',RecipeController::class)->names('admin.recipes');
Route::resource('comments',CommentController::class)->names('admin.comments');
Route::resource('categories',CategoryController::class)->names('admin.categories');
Route::resource('menus',MenuController::class)->names('admin.menus');

// Route::get('item',ShowItem::class)->name('item');