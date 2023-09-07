<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Comentarios extends Model
{
    use HasFactory;
     
    protected $fillable = [
        'description', 
        
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(user::class, 'idUser', 'id');
    }

    

}
