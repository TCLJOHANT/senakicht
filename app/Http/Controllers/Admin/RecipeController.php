<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recetas;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = Recipe::all();
        return view('admin.cruds.recipes',compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required',
            'images' => 'image|max:2048',
            'ingredients'=> 'required',
            'preparation'=> 'required',
        ]);

        $image = $request->file('images');
        $fileName = $image->getClientOriginalName();//obtener name original de archivo de imagen
        $filePath = $image->store('recipes', 'public');
        
        $data = $request->only('name', 'email', 'password');
        $data['images'] = $filePath;
        
        Recipe::create($data);
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
     
     public function destroy(Recipe $receta)
     {
         $receta->delete();
         return redirect('admin.recipes.index');
     }
}
