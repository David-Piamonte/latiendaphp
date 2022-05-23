@extends('layouts.principal')

@section('contenido')

    <form class="col s8" method="POST" action="{{ route('productos.store')}}">
      @csrf
        <div class="row">
            <div class="col s8">
                <h1 class="blue-text text-darken-2">
                    Nuevo Producto
                </h1>
            </div>
        </div>
      <div class="row">
        <div class="input-field col s8">
          <input placeholder="Nombre del Producto" 
          id="Nombre" 
          type="text" 
          class="validate"
          name="nombre">
          <label for="Nombre">
              Nombre de Productos
            </label>
        </div>
      <div class="row">
        <div class="input-field col s8">
          <input id="disc" 
          type="text" 
          class="validate"
          name="disc">
          <label for="disc">Descripción</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s8">
          <input id="precio" 
          type="number" 
          class="validate"
          name="precio">
          <label for="precio">Precio</label>
        </div>
      </div>
      <div class="row">
        <div class="col s8 input-field">
          <select name="marca" id="marca">
            <option>
              Elija su marca
            </option>
            @foreach($marcas as $marca)
            <option value="{{$marca->id }}">
              {{ $marca->nombre }}
            </option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col s8 input-field">
          <select name="categoria" id="categoria">
            <option>
              Elija su categoria
            </option>
            @foreach($categorias as $categoria)
            <option  value="{{$categoria->id }}">
              {{ $categoria->nombre }}
            </option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="row">
      <div class="file-field input-field">
      <div class="btn">
        <span>Ingrese Imagen...</span>
        <input type="file">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" 
        type="text">
      </div>
    </div>
      </div>
      <div class="row">
        <div class="col s12">
        <button class="btn waves-effect waves-light" type="submit">Guardar
        
         </button>
          </div>
        </div>
    </form>
  
  @endsection
