<?php
namespace App\Livewire\Shared;
use App\Livewire\Admin\Recipe\ShowRecipes;
use App\Models\Category;
use App\Models\Ingredient;
use Livewire\Component;
use App\Models\Recipe;
use App\Models\Multimedia;
use App\Models\PreparationStep;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class FormRecipe extends Component
{
    use WithFileUploads; 
    public  $titleModal = "Crear Receta", $btnModal = "Crear" , $openModal =false;
    //variables inputs
    public $name,$difficulty,$preparation_time,$description,$category_id,$identificador,$recipeId,
    $ingredientes = [],$pasos=[], $lista = []  , $nuevaImagen;

    private $resetVariables = ['openModal','category_id','name','preparation_time','difficulty','description','ingredientes','pasos','btnModal','titleModal','lista'];
    //emit    
    protected $listeners = ['editarRecetaForm'];
    public $rules = [
        'name'=> 'required',
        'difficulty'=>'required',
        'preparation_time' => 'required',
        'description'=> 'required',
        'category_id' => 'required',
        //'lista.*' => 'image|max:1024', // Ajusta según tus necesidades
    ];

    public function mount(){ 
        $this->identificador = rand(); //le asigna un numero al azar o random
        $this->ingredientes = []; //array vacio
        $this->pasos = []; //array vacio
        $this->lista = []; //array vacio
    }
    public function render(){
        $categories = Category::where('type', 'recipeAndMenu')->get();
        return view('livewire.shared.form-recipe',compact('categories'));
    }

    public function editarRecetaForm(Recipe $recipe){
        $this->reset($this->resetVariables);
        $this->recipeId = $recipe->id;
        $this->name =$recipe->name;
        $this->description =$recipe->description;
        $this->difficulty =$recipe->difficulty;
        $this->preparation_time =$recipe->preparation_time;
        $this->ingredientes = $recipe->ingredients;
        $this->category_id = $recipe->category_id;
        $this->ingredientes = [];
        foreach ($recipe->ingredients as $dataIngredients) {
            $this->ingredientes[] = [
                'quantity' => $dataIngredients->quantity,
                'unit' => $dataIngredients->unit,
                'name' => $dataIngredients->name,
                'measurement' => $dataIngredients->measurement,
            ];
        }
        foreach ($recipe->preparationSteps as $pasos) {
            $this->pasos[] = $pasos->description_step;}
        foreach ($recipe->multimedia as $multimedia) {
            $this->lista[] = $multimedia->ruta;}
        $this->titleModal = "Editar Receta"; $this->btnModal = "Actualizar";
         $this->openModal= true;
    }

    public function createOrUpdate(){
        $recipeData = [
            'name' => $this->name,
            'difficulty' => $this->difficulty,
            'description' => $this->description,
            'preparation_time' => $this->preparation_time,
            'category_id' => $this->category_id,
            'user_id' => Auth::user()->id,
        ];
        ///CREAR:CREATE
        if ($this->btnModal == "Crear") {
            $this->validate();
            $recipe = Recipe::create($recipeData);
                foreach ($this->lista as $image) {
                    $path = $image->store('recipes');
                    $multimedia = new Multimedia();
                    $multimedia->ruta = $path;
                    $multimedia->type = 'imagen';
                    $recipe->multimedia()->save($multimedia);
                }
            $this->createIngredients($recipe);
            $this->createPreparationSteps($recipe);
        } 
        //ACTUALIZAR:UPDATE
        elseif ($this->btnModal == "Actualizar") {
            $recipeEdit = Recipe::find($this->recipeId);
            if ($recipeEdit) {
                $recipeData['user_id'] = $recipeEdit->user_id;
                $recipeEdit->update($recipeData);
                  // Rastrear las imágenes existentes
                    $existingImages = $recipeEdit->multimedia->pluck('ruta')->toArray();
                    // Eliminar las imágenes existentes que no están en la nueva lista
                    foreach ($existingImages as $existingImage) {
                        if (!in_array($existingImage, $this->lista)) {
                            Storage::disk('public')->delete($existingImage);
                            // Eliminar de la base de datos
                            $recipeEdit->multimedia()->where('ruta', $existingImage)->delete();
                        }
                    }

                    // Guardar nuevas imágenes
                    foreach ($this->lista as $image) {
                        $path = $image->store('recipes');

                        // Si la imagen ya existe, no la guardamos de nuevo
                        if (!in_array($path, $existingImages)) {
                            $multimedia = new Multimedia();
                            $multimedia->ruta = $path;
                            $multimedia->type = 'imagen';
                            $recipeEdit->multimedia()->save($multimedia);
                        }
                    }

                // // Eliminar todas las imágenes existentes en el disco
                // foreach ($recipeEdit->multimedia as $media) {
                //     Storage::disk('public')->delete($media->ruta);
                //     $media->delete();
                // }
                // // Eliminar todas las imágenes existentes en registros base de datos
                // $recipeEdit->multimedia()->delete();

                // // Guardar nuevas imágenes
                // foreach ($this->lista as $image) {
                //     $path = $image->store('recipes');
                //     $multimedia = new Multimedia();
                //     $multimedia->ruta = $path;
                //     $multimedia->type = 'imagen';
                //     $recipeEdit->multimedia()->save($multimedia);
                // }
                    // Actualizar los ingredientes existentes
                    $this->updateIngredients($recipeEdit);
                    // Crear nuevos ingredientes si es necesario
                    $this->createIngredients($recipeEdit);
                    // Actualizar los pasos de preparación
                    $this->updatePreparationSteps($recipeEdit);
            }
        }
        $this->reset($this->resetVariables);
        $this->identificador = rand();
        $this->dispatch('render')->to(ShowRecipes::class);
    }

    
    // Métodos auxiliares para crear y 
    //actualizar ingredientes y pasos de preparación
    private function createIngredients($recipe){
        foreach ($this->ingredientes as $ingrediente) {
            Ingredient::create([
                'recipe_id' => $recipe->id,
                'quantity' => $ingrediente['quantity'],
                'unit' => $ingrediente['unit'],
                'name' => $ingrediente['name'],
                'measurement' => $ingrediente['measurement'],
            ]);
        }
    }

    private function updateIngredients($recipe){
        foreach ($this->ingredientes as $index => $ingrediente) {
            // Si ya existe un ingrediente en esa posición, actualizarlo
            if (isset($recipe->ingredients[$index])) {
                $recipe->ingredients[$index]->update([
                    'quantity' => $ingrediente['quantity'],
                    'unit' => $ingrediente['unit'],
                    'name' => $ingrediente['name'],
                    'measurement' => $ingrediente['measurement'],
                ]);
            }
        }
    }

    private function createPreparationSteps($recipe){
        foreach ($this->pasos as $index => $paso) {
            PreparationStep::create([
                'recipe_id' => $recipe->id,
                'step_number' => $index + 1,
                'description_step' => $paso,
            ]);
        }
    }

    private function updatePreparationSteps($recipe){
        foreach ($this->pasos as $index => $paso) {
            // Si ya existe un paso en esa posición, actualizarlo
            if (isset($recipe->preparationSteps[$index])) {
                $recipe->preparationSteps[$index]->update([
                    'description_step' => $paso,
                ]);
            }
        }
    }
    //Frontend agregar o eliminar, paso,ingrediente,imagen
    public function agregarIngrediente()
    { $this->ingredientes[] = ['quantity' => '', 'unit' =>'','name' => '', 'measurement' => '',];}

    public function eliminarIngrediente($index){ 
        unset($this->ingredientes[$index]);
        $this->ingredientes = array_values($this->ingredientes);
    }

    public function agregarPaso(){ $this->pasos[] = '';}

    public function eliminarPaso($index){
        unset($this->pasos[$index]);
        $this->pasos = array_values($this->pasos);
    }

    public function agregarImagen(){
        $rutaNuevaImagen = $this->nuevaImagen->store('images', 'public');
        $this->lista[] = $rutaNuevaImagen;
        $this->nuevaImagen = null;  
        $this->render();
    }

    public function removeImage($index){
        unset($this->lista[$index]);
        $this->lista = array_values($this->lista); // Reindexar el array después de eliminar una imagen
    }

}
