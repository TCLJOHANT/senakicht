<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class ShowItem extends Component
{
    public function render()
    {
        $items = User::all();
        return view('livewire.show-item',compact('items'))->layout('layouts.admin');
    }
}
