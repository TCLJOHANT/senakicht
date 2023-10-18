<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;

class ShowItems extends Component
{
    public $search;
    public $model;
    public $subItems = "";
    public $titleModal;
    public $modelName;
    public $fields;
    public $editItem = 'vaciar';
    public $open = false;

    public function render()
    {
        if($this->model == "Role"){
            $modelClass = "Spatie\Permission\Models\Role";
        }
        else{
            $modelClass = app("App\Models\\" . $this->model);
        }
        
        $items = $modelClass::where('name', 'LIKE', '%' . $this->search . '%')->get();
        return view('livewire.admin.show-items', compact('items'));
    }

    
    public function editItemData($data){

        $this->editItem =$data;
        $this->open = true;
    }
    public function limpiarModal(){
        $this->editItem = 'vaciar';
        $this->open = true;
    }

}