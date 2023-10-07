<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;


class RecipeController extends Controller
{
    
    public function index()
    {
        $recetas = Recipe::all();
        return view('Cruds.crudRecetas',compact('recetas'));
    }

    public function pdf($id){
        $receta = Recipe::find($id);
        $pdf = Pdf::loadView('home.pdf', compact('receta'));
        return $pdf->stream();
    }

  
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name'=> 'required',
            'images'=> 'required|image|mimes:png,jpg,jpeg|max:5000',
            'ingredients'=> 'required',
            'description'=> 'required',

        ]);
     
        $files = $request->file('images');
        $name = $files->getClientOriginalName();
        $estencion = $files->getClientOriginalExtension();

        // $files->store('images', ['disk' => 'public']);
        $rutaImagen = $files->storeAs('images',$name, ['disk' => 'public']);
        $data = $request->only('name','ingredients','description');
        $data['images']=$rutaImagen;
        Recipe::create($data);

        

        return redirect()->route('crudRecetas.store');
    }

    
 
    // public function update(Request $request, Recipe $recetas)
    // {
    //     $this->validate($request, [
    //         'name'=> 'required',
    //         'images'=> 'image|mimes:png,jpg|max:5000',
    //         'ingredients'=> 'required',
    //         'description'=> 'required',

    //     ]);
    //     $recetas->name = $request->name;
    //     $recetas->ingredients = $request->ingredients;
    //     $recetas->description = $request->description;


    //  if ($request->hasFile('images')) {
    //     $files = $request->file('images');
    //     $name = $files->getClientOriginalName();
    //     $rutaImagen = $files->storeAs('images',$name, ['disk' => 'public']);
        
        
    //     $recetas->images = $rutaImagen;
    //     Storage::disk('public')->delete($recetas->images);

        

    //  }
    
     
    //  $recetas->save();
     
    //  return redirect('crudRecetas');
 

    // }

 
    public function destroy(Recipe $recetas)
{
    $recetas->delete();

    return redirect('crudRecetas');
}
}
