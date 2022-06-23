<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
    use HasFactory;
    //extender modelo para relacionarlo con Producto
    public function productos(){
        //1 ctaegoria - m productos
        return $this->hasMany(Producto::class);
    }
}
