<?php

namespace App\Livewire\Shared;

use App\Livewire\Admin\ShowMenus;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Multimedia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class FormPlate extends Component
{
    use WithFileUploads; 
    //vars modal
    public  $titleModal = "Crear Plato", $btnModal = "Crear" , $openModal =false;
    protected $listeners = ['editarPlateForm'];
         //variables inputs
    public $name,$price,$quantity,$description,$category_id,$identificador,$platoId,
    $listaImages = [] ;
     
     private $resetVariables = ['openModal','category_id','name','price','quantity','description','btnModal','titleModal','listaImages','category_id','platoId'];
         //emit    
     public $rules = [
         'name'=> 'required',
         'price'=>'required',
         'quantity' => 'required',
         'description'=> 'required',
         'category_id' => 'required',
         //'lista.*' => 'image|max:1024', // Ajusta según tus necesidades
     ];
     public function mount(){ 
         $this->identificador = rand(); //le asigna un numero al azar o random
         $this->listaImages = []; //array vacio
     }
    public function render()
    {
        $categories = Category::where('type', 'recipeAndMenu')->get();
        return view('livewire.shared.form-plate',compact('categories'));
    }

    public function editarPlateForm(Menu $menu){
        $this->reset($this->resetVariables);
        $this->platoId = $menu->id;
        $this->name =$menu->name;
        $this->description =$menu->description;
        $this->price =$menu->price;
        $this->quantity =$menu->quantity;
        $this->category_id = $menu->category_id;
        foreach ($menu->multimedia as $multimedia) {
            $this->listaImages[] = $multimedia->ruta;}
        $this->titleModal = "Editar Plato"; $this->btnModal = "Actualizar";
         $this->openModal= true;
    }

    public function createOrUpdate(){
        $platoData = [
            'name' => $this->name,            
            'price'=>$this->price,
            'quantity' => $this->quantity,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'user_id' => Auth::user()->id,
        ];
        ///CREAR:CREATE
        if ($this->btnModal == "Crear") {
            $this->validate();
            $plato = Menu::create($platoData);
                foreach ($this->listaImages as $image) {
                    $path = $image->store('products');
                    $multimedia = new Multimedia();
                    $multimedia->ruta = $path;
                    $multimedia->type = 'imagen';
                    $plato->multimedia()->save($multimedia);
                }

        } 
        //ACTUALIZAR:UPDATE
        elseif ($this->btnModal == "Actualizar") {
            $platoEdit =Menu::find($this->platoId);
            if ($platoEdit) {
                $productData['user_id'] = $platoEdit->user_id;
                $platoEdit->update($productData);
                  // Rastrear las imágenes existentes
                    $existingImages = $platoEdit->multimedia->pluck('ruta')->toArray();
                    // Eliminar las imágenes existentes que no están en la nueva lista
                    foreach ($existingImages as $existingImage) {
                        if (!in_array($existingImage, $this->listaImages)) {
                            Storage::disk('public')->delete($existingImage);
                            // Eliminar de la base de datos
                            $platoEdit->multimedia()->where('ruta', $existingImage)->delete();
                        }
                    }

                    // Guardar nuevas imágenes
                    foreach ($this->listaImages as $image) {
                        $path = $image->store('recipes');

                        // Si la imagen ya existe, no la guardamos de nuevo
                        if (!in_array($path, $existingImages)) {
                            $multimedia = new Multimedia();
                            $multimedia->ruta = $path;
                            $multimedia->type = 'imagen';
                            $platoEdit->multimedia()->save($multimedia);
                        }
                    }
            }
        }
        $this->reset($this->resetVariables);
        $this->identificador = rand();
        $this->dispatch('render')->to(ShowMenus::class);
    }
}
