<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class ShowItem extends Component
{
    public $s="estobuscara";
    // public $items;
    // // public $titleModal;
    // // public $modelName;
    public $fields =[
        ["name" => "name", "type" => "text"],
        ["name" => "profile_photo_path", "type" => "file"],
        ["name" => "email", "type" => "email"],
        ["name" => "password", "type" => "password"],
    ];
    public function render()
    {
        $items = User::all();
        return view('livewire.show-item',compact('items'))->layout('layouts.admin');
    }
}
