<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    //extender modelo para relacionarlo con marca
    public function productos(){
        //1 ctaegoria - m productos
        return $this->hasMany(Producto::class);
    }
 }

