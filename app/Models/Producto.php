<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    //relacion m - 1 con categoria
    public function categorias()
    {
        return $this->belongsTo(categorias::class, 'categorias_id');
    }
    public function Marca()
    {
        return $this->belongsTo(Marca::class, 'marcas_id');
    }
}
