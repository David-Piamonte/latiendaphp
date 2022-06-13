@extends('layouts.principal')

@section('contenido')

    <form class="col s8" 
    method="POST" 
    action="{{ route('productos.store')}}"
    enctype="multipart/form-data"
    >
      @csrf
      @if(session('mensajito') )
      <div class="row">
        <strong>{{ session('mensajito')}}</strong>
      </div>

      @endif
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
            <strong style="color:red">{{$errors->first('nombre') }}</strong>
        </div>
      <div class="row">
        <div class="input-field col s8">
          <input id="disc" 
          type="text" 
          class="validate"
          name="disc">
          <label for="disc">Descripción</label>
          <strong style="color:red">{{$errors->first('disc') }}</strong>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s8">
          <input id="precio" 
          type="number" 
          class="validate"
          name="precio">
          <label for="precio">Precio</label>
          <strong style="color:red">{{$errors->first('precio') }}</strong>
        </div>
      </div>
      <div class="row">
        <div class="col s8 input-field">
          <select name="marca" id="marca">
            <option value="">
              Elija su marca
            </option>
            @foreach($marcas as $marca)
            <option value="{{$marca->id }}">
              {{ $marca->nombre }}
            </option>
            @endforeach
          </select>
          <label>Elija marca</label>
          <strong style="color:red">{{$errors->first('marca') }}</strong>
        </div>
      </div>
      <div class="row">
        <div class="col s8 input-field">
          <select name="categoria" id="categoria">
            <option value="">
              Elija su categoria
            </option>
            @foreach($categorias as $categoria)
            <option  value="{{$categoria->id }}">
              {{ $categoria->nombre }}
            </option>
            @endforeach
          </select>
          <label>Elija la categoria</label>
          <strong style="color:red">{{$errors->First('categoria') }}</strong>
        </div>
      </div>
      <div class="file-field input-field" multiple>
      <div class="btn">
        <span>imagen</span>
        <input type="file" name="imagen">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
      <strong style="color:red">{{$errors->First('precio') }}</strong>
    </div>
      <div class="row">
        <div class="col s12">
        <button class="btn waves-effect waves-light" type="submit">Guardar
         </button>
          </div>
        </div>
    </form>
  
  @endsection
