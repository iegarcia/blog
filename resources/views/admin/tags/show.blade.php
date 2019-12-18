@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Ver Etiqueta
          </div>

          <div class="card-body">
          <p><strong>Nombre:</strong> {{$tag->name}}</p>
          <p><strong>Slug:</strong> {{$tag->slug}}</p>
        </div>
      </div>
      <br>
      <a href="{{route('tags.index')}}"><button class="btn btn-sm btn-secondary">Atras</button></a>
    </div>
  </div>
@endsection
