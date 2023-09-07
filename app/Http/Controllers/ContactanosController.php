<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;

class ContactanosController extends Controller
{
    public function contactos(){
        return view('home.contactos');

    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'affair' => 'required',
            'message' => 'required',
        ]);
        $correo = new ContactanosMailable($request->all());
    
        Mail::to('yoniersebastian23@gmail.com')->send($correo);
        return redirect()->route('contactos')->with('info','mensaje enviado');

    }
}
