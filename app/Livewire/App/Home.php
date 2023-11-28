<?php

namespace App\Livewire\App;

use App\Models\Comment;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Recipe;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $recipes = Recipe::take(4)->get();
        $products = Product::take(4)->get();
        $menus = Menu::take(4)->get();
        $comments =Comment::take(3)->get();
        return view('livewire.app.home',compact('recipes','products','menus','comments'));
    }
}
