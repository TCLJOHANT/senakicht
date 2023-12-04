<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return Product::all();
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // Validar los datos de la solicitud si es necesario

    $product = Product::create($request->all());

    if ($request->hasFile('image')) {
      // Obtener el nombre original del archivo
      $originalFileName = $request->file('image')->getClientOriginalName();

      // Convertir espacios en blanco a guiones bajos en el nombre del archivo
      $convertedFileName = strtr($originalFileName, " ", "_");

      // Generar un nombre aleatorio único para evitar conflictos
      $randomName = Str::random(10) . $convertedFileName;

      // Construir la ruta completa donde se guardará la imagen
      $path = storage_path('app/public/productos/imagenes/') . $randomName;

      // Redimensionar y guardar la imagen utilizando la biblioteca Intervention Image
      Image::make($request->file('image'))
        ->resize(900, null, function ($constraint) {
          $constraint->aspectRatio();
        })
        ->save($path);
    }

    return response()->json($product, 201);
  }

  /**
   * Display the specified resource.
   */
  public function show(Product $product)
  {
    return response()->json($product);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Product $product)
  {
    $product->update($request->all());
    // No se devuelve ningún mensaje adicional
    return response()->json($product, 200);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Product $product)
  {
    $product->delete();
    // No se devuelve ningún mensaje adicional
    return response()->json([]);
  }
}
