<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comentarios;
use Illuminate\Http\Request;

class commentController extends Controller
{

    public function index()
    {
        $users = Comentarios::all();
        return view('admin.cruds.comments',compact('comments'));
    }
}
