<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\categorias;
use App\Models\Marca;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the productos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "aqui va a ir el catalogo de productos";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //selecionar todas las marcas 
        $marcas = Marca::all();
        //selecionar todas las categorias
        $categorias = categorias::all();
        //mostrar la vista de nuevo productos enviandoles los datos de marcas y categorias
        return view('productos.create' )
                ->with('marcas' , $marcas)
                ->with('categorias' , $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        //crear nuevo producto
        $p = new producto();
        $p->nombre = $r->nombre;
        $p->desc = $r->disc;
        $p->precio = $r->precio;
        $p->marcas_id = $r->marca;
        $p->categorias_id = $r->categoria;
        //grabar producto
        $p->save();
        echo "producto guardado";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show( $producto)
    {
        echo "Aqui van el detalle del producto con id: $producto";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit( $producto)
    {
        echo "Aqui va el formulario para actualizar producto";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
