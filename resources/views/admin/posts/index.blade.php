@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Entradas
            <a href="{{route('posts.create')}}" class="btn btn-sm btn-primary float-right">Crear</a>
          </div>
        </div>

      </div class="card-body">
      <table class="table table-striped table-hover">
        <thead>

          <tr>
            <th width="10px">N°</th>
            <th>Nombre</th>
            <th colspan="3">&nbsp;</th>
          </tr>
        </thead>
        @foreach ($posts as $post)
          <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td width="10px"></td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
@endsection
