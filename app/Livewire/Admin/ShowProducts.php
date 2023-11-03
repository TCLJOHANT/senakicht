<?php

namespace App\Livewire\Admin;

use App\Exports\ProductExport;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
class ShowProducts extends Component
{
    use WithPagination;
    use WithFileUploads; 
    public $search;
    public $openModal = false;
    public $name, $price,$description,$image,$identificador,$productId;
    public $titleModal = "Crear Producto", $btnModal = "Crear";

    private $resetVariables = ['openModal','name','image','price','description','btnModal','titleModal'];
    public function mount(){
        $this->identificador = rand(); //le asigna un numero al azar o random
    }
    public function render()
    {
        $products = Product::where('name', 'LIKE', '%' . $this->search . '%')->paginate(5);
        return view('livewire.admin.show-products', compact('products'));
    }
    public function abrirModal(){
        $this->reset($this->resetVariables);
        $this->identificador = rand(); //le asigna un numero al azar o random (se hace para que input file cambie y no ponga el anterior)
        $this->openModal = true;
    }

    public function createOrUpdate(){
        $image = $this->image->store('products');
        $userAuth = Auth::user()->id;
        $product = [
            'name'=>$this->name,
            'image'=>$image,
            'description'=>$this->description,
            'price'=>$this->price,
            'user_id'=> $userAuth
        ];
        if($this->btnModal=="Crear"){ 
            $this->validate();
            Product::create($product);
            $this->reset($this->resetVariables);
            $this->identificador = rand(); //le asigna un numero al azar o random (se hace para que input file cambie y no ponga el anterior)
        }
        elseif($this->btnModal=="Actualizar") { 
            $productEdit = Product::find($this->productId); 
            Storage::disk('public')->delete($productEdit->image); // Eliminar la imagen antigua
            if($productEdit) {
                $productEdit->update($product);
                $this->reset($this->resetVariables);
                $this->identificador = rand(); 
            }
        }
    }

    public function destroyProduct(Product $product) {
        //eliminar imagen
        if($product->image){Storage::disk('public')->delete($product->image);}
        $product->delete();
        $this->resetPage();
    }
    public function modalEdit(Product $product){
        $this->productId = $product->id;
        $this->description =$product->description;
        $this->name =$product->name;
        $this->price =$product->price;
        $this->image =$product->image;
    
         $this->titleModal = "Editar Producto";
        $this->btnModal = "Actualizar";
         $this->openModal= true;
    }
    //reiniciar paginacion si se cambia la variable search
    public function updatingSearch(){
        $this->resetPage();
    }


    public function exportar(){
        $productsExport = new ProductExport;
        return $productsExport->download('products.xlsx');
    }
}
