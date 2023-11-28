<?php

namespace App\Livewire\App;

use App\Models\Comment;
use Livewire\Component;

class Comentarios extends Component
{
    public function render()
    {
        $comentarios = Comment::all();
        return view('livewire.app.comentarios',compact('comentarios'));
    }
}
