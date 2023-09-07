<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    
    public function index(){
        $productos= Productos::all();
        return view('Cruds.CrudProductos',compact('productos'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name'=> 'required',
            'image'=> 'required|image|mimes:png,jpg',
            'price'=> 'required',
            

        ]);
     
        $files = $request->file('image');
        $name = $files->getClientOriginalName();
        $estencion = $files->getClientOriginalExtension();

        // $files->store('images', ['disk' => 'public']);
        $rutaImagen = $files->storeAs('products',$name, ['disk' => 'public']);
        $data = $request->only('name','price');
        $data['image']=$rutaImagen;
        Productos::create($data);

        

        return redirect("productos");

       
    }

    public function destroy(Productos $productos)
    {
        $productos->delete();
    
        return redirect('crudProductos');
    }

}
