<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\categorias;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the productos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //selecionar todos los productos
        $producto=Producto::all();
      //mostrar vista del catalogo de productos
      //llevando la lista de productos 
      return view('productos.index')
      ->with('producto' , $producto);
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
        //Validaciones
        //1. establecer reglas de validacion
        $reglas=[
            "nombre" =>'required|alpha|unique:productos,nombre',
            "disc" => 'required|min:5|max:20',
            "precio" => 'required|numeric',
            "imagen" => 'required|image',
            "marca" => 'required',
            "categoria" => 'required'
        ];

        //2. crear el objeto validador
        $v = Validator::make($r->all() , $reglas );

        //3. validar
        if ($v->fails()) {
            //si la validacion fallo
            //redirigirme a la vista de create(ruta: productos/create)
            return redirect('productos/create')
                ->withErrors($v);
        }
        else {
            //si la validacion es exitosa
            $archivo=$r->imagen;
        //obtener el nombre original del archivo
        $nombre_archivo=$archivo->getClientOriginalName();
        //establecer la ubicacion de guardado del archivo
        $ruta = public_path()."/img";
        //mover el archivo de imagen a la ubicacion y nombre deseados 
        $archivo->move($ruta , $nombre_archivo );
        //crear nuevo producto
        $p = new producto();
        $p->nombre = $r->nombre;
        $p->desc = $r->disc;
        $p->precio = $r->precio;
        $p->marcas_id = $r->marca;
        $p->categorias_id = $r->categoria;
        $p->imagen = $nombre_archivo;
        //grabar producto
        $p->save();
        //redirigir a productos/create
        //con un mensaje de exito
        return redirect('productos/create')
            ->with('mensajito', 'producto registrado exitosamente');
        }
       
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
