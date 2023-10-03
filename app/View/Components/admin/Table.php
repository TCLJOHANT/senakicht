<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Table extends Component
{
     public $columns;
     public $items;
    // public $modelName;

    // /**
    //  * Create a new component instance.
    //  */
    // public function __construct($modelName)
    // {
    //     
    //    ;
    //     $this->modelName = $modelName;
    // }
    public function __construct($columns,$items)
    {
        $this->columns = $columns;
        $this->items = $items;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.table');
    }
}
