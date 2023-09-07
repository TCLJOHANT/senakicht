<?php
 
 
namespace App\Models ;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Productos extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'price',

    ];


    
    public function pagos()
    {
        return $this->belongsTo(pagos::class, 'idPagos', 'id');
    }

     public function Productos(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'idProductos', 'id');
    }
}
