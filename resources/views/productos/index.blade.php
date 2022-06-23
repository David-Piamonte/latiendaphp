@extends('layouts.principal')

@section('contenido')
<div class="row">
    <h1>Catálogo de productos</h1>
</div>
@foreach($producto as $producto)
<div class="row">
<div class="col s12 m7">
      <div class="card">
        <div class="card-image">
          <img src="{{asset('img/' .$producto->imagen)}}">
          <span class="card-title">{{$producto->nombre}}</span>
        </div>
        <div class="card-content">
          <p>{{$producto->desc}}</p>
          <ul>
            <li>Precio $ {{$producto->precio}}</li>
            <li>Categorias: {{$producto->categorias->nombre}}</li>  
            <li>Marca: {{$producto->Marca->nombre}}</li>  
        </ul>
        </div>
        <div class="card-action">
          <a href="#">This is a link</a>
        </div>
      </div>
    </div>
</div>
@endforeach
@endsection