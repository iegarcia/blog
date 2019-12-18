@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Etiquetas
            <a href="{{route('tags.create')}}" class="btn btn-sm btn-primary float-right">Crear</a>


          <div class="card-body">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th width="10px">N°</th>
                <th>Nombre</th>
                <th colspan="3">&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tags as $tag)
                <tr>
                  <td>{{$tag->id}}</td>
                  <td>{{$tag->name}}</td>
                  <td width="10px"><a href="{{ route('tags.show', $tag->id)}}" class="btn btn-sm btn-success">Ver</a></td>
                  <td width="10px"><a href="{{ route('tags.edit', $tag->id)}}" class="btn btn-sm btn-secondary">Editar</a></td>
                  <td width="10px">
                    {!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) !!}
                    <button  onclick="confirm('Esta seguro que desea eliminarlo?')"class="btn btn-sm btn-danger">Eliminar</button>
                    {!! form::close() !!}
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          {{ $tags}}
        </div>
        <a href="{{route('blog')}}"><button class="btn btn-sm btn-secondary">Atras</button></a>
      </div>
    </div>
  </div>
@endsection
