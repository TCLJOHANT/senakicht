<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function factura($id){
        
        $venta = Sale::with('carts')->find($id);
        $pdf = Pdf::loadView('home.factura', compact('venta'));
        return $pdf->stream();
    }

    public function index()
    {
        $sale = Sale::all();
        return view('profile.show',compact('sale'));
    }
}
