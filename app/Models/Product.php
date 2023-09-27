<?php
 
 
namespace App\Models ;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function pagos()
    {
        return $this->belongsTo(pagos::class, 'idPagos', 'id');
    }

     public function Productos(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'idProductos', 'id');
    }
      //relaciion uno amuchos inversa
      public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

}
