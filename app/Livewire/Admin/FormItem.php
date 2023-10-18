<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class FormItem extends Component
{
    public $open = false, $fields,
    $modelName = "products";
    public $editItem = "vaciar"; 
    public $titleModal = "Item";
    
    public function render()
    {
        return view('livewire.admin.form-item');
    }
}
