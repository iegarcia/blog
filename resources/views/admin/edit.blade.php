@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Editar
          </div>

          <div class="card-body">
          {!! Form::model($post, ['route' => ['posts.update', $post->id],'method' => 'PUT']) !!}
          @include('admin.posts.partials.form')
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection
