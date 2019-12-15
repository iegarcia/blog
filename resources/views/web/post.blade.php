@extends('layouts.app')

@include('partials.head')

@section('content')
  <div class="container">
    <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1>{{$post->title}}</h1>

        <div class="card mb-3">
          <h6 class="card-title">Categoria <a href="{{ route('category', $post->category->slug)}}">{{$post->category->name}}</a></h6>

          <div class="card-body">
            @if($post->file)
              <img src="{{$post->file}}" class="img-fluid card-img-top" alt="{{ $post->title }}">
            @endif
            <p class="card-text">
              {{ $post->excerpt }}
              <hr>
              Etiquetas
              @foreach ($post->tags as $tag)
                <a href="{{ route('tag', $tag->slug)}}">{{$tag->name}}</a>
              @endforeach
            </p>
            <p class="float-right">Publicado el: {{$post->created_at}}</p>
          </div>
        </div>
    </div>
  </div>
@endsection

@include('partials.footer')
