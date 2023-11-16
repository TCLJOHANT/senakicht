<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $guarded =[];
    
    // Relación con el modelo Product
    // public function menu()
    // {
    //     return $this->belongsTo(Menu::class);
    // }

    
}
