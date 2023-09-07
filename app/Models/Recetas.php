<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recetas extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'images',
        'ingredients',
        'description',


    ];

    public function aprendiz(){
        return $this->belongsTo(aprendiz::class, 'idAprendiz', 'id');
    }

    // public function aprendiz(){
    //     return $this->belongsTo(aprendiz::class, 'idAprendiz', 'id');
    // }




}
