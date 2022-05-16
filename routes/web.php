<?php

use Illuminate\Support\Facades\Route;
use App\Models\Marca;
use App\Models\Categorias;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('paises', function () {
    $paises = [
        "Colombia" => [
            "Cap" => "Bogotá",
            "mon" => "peso",
            "pob" => "51",
            "ciu" => [
                "Medellin",
                "Cali",
                "Pereira"
            ]
        ],
        "Ecuador" => [
            "Cap" => "Quito",
            "mon" => "Dolar",
            "pob" => "20",
            "ciu" => [
                "Cuenca",
                "Guayaquil"
            ]
        ],
        "Mexico"=> [
            "Cap" => "Ciudad de Mexico",
            "mon" => "peso",
            "pob" => "38",
            "ciu" => [
                "Monterrey",
                "Chiguagua",
                "Guadalajara",
                "Cancún"
            ]
        ]
    ];
    return view('paises')
    ->with('paises', $paises);
});

Route::get('prueba', function(){
    //seleccionar marcas:
    $marcas = Marca::all();
    //seleccionar categorias 
    $categorias = Categorias::all();
    //ingresar marcas y categorias a la vista 
    return view('productos.create')
            ->with('categorias', $categorias)
            ->with('marcas', $marcas);
});