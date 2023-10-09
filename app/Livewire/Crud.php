<?php

namespace App\Livewire;

use Livewire\Component;
use Mockery\Undefined;

class Crud extends Component
{
    public $items;
    public $titleModal;
    public $modelName;
    public $fields;
    public $editItem = 'vaciar';

    public function render()
    {
        return view('livewire.crud');
    }
    public function editItemData($data){
        $this->editItem =$data;
    }
    public function editItemVaciar(){
        $this->editItem = 'vaciar';
    }
       
}
