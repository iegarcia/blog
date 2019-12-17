@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Ver
          </div>

          </div class="card-body">
          <p><strong>Nombre:</strong> {{$post->title}}</p>
          <p><strong>Slug:</strong> {{$post->slug}}</p>
        </div>
      </div>
    </div>
  </div>
@endsection
