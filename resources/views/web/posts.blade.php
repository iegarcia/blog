@extends('layouts.app')

@include('partials.head')

@section('content')
  <div class="container">
    <div class="col-md-8 col-md-offset-2">
      <h1>Artículos</h1>
      @foreach($posts as $post)
        <div class="card mb-3">
          <h4 class="card-title">{{ $post->title }}</h4>
          @if($post->file)
            <img src="{{$post->file}}" class="img-fluid" alt="{{ $post->name }}">
          @endif
          <div class="card-body">
            <p class="card-text">
              {{ $post->excerpt }}
            </p>
            <a href="{{ route('post', $post->slug)}}" class="d-flex justify-content-end">Leer más</a>
          </div>
        </div>
      @endforeach
      {{$posts}}
    </div>
  </div>
@endsection
