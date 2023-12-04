<?php

namespace App\Livewire\Admin;

use App\Models\Sale;
use Livewire\Component;

class ShowSales extends Component
{
  
    public $search;
    protected $listeners = ['render'];
    public function render()
    {
        $sales = Sale::where('order_number', 'LIKE', '%' . $this->search . '%')->paginate(5);
        return view('livewire.admin.show-sales',compact('sales'));
    }
}
