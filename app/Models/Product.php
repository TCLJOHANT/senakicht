<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function aprendiz()
    {
        return $this->belongsTo(aprendiz::class, 'idAprendiz', 'id');
    }
}
