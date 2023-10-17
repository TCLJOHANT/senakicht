<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class CreateComment extends Component
{
    public $open = true;
    public $comment;
    public function render()
    {
        return view('livewire.admin.create-comment');
    }
}
