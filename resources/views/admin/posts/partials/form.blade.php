<br>
{{ Form::hidden('user_id', auth()->user()->id) }}

<div class="form-control alert-dark">
  <strong>{{ Form::label('title', 'Titulo')}}</strong>
</div>
{{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title'])}}
<br>
<div class="form-control alert-dark">
<strong>{{ Form::label('slug', 'URL Amigable')}}</strong>
</div>
{{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug'])}}
<br>
<div class="form-control alert-dark">
  <strong>{{ Form::label('category_id', 'Categoria')}}</strong>
</div>
{{ Form::select('category_id', $cats, null, ['class' => 'form-control'])}}
<br>
<div class="form-control alert-dark">
  <strong>{{ Form::label('tag_id', 'Etiqueta')}}</strong>
</div>
@foreach ($tags as $tag)
  <label>{{ Form::checkbox('tags[]', $tag->id) }} {{$tag->name}}</label>
@endforeach
<br>
<br>
<div class="form-control alert-dark">
<strong>{{ Form::label('excerpt', 'Extracto')}}</strong>
</div>
{{ Form::textarea('excerpt', null, ['class' => 'form-control', 'rows' => '2'])}}
<br>
<div class="form-control alert-dark">
<strong>{{ Form::label('body', 'Descripcion')}}</strong>
</div>
{{ Form::textarea('body', null, ['class' => 'form-control', 'id' => 'slug'])}}
<br>
{{ Form::file('file')}}
<hr>
{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary'])}}
{{Form::close()}}
<br>
<a href="{{route('posts.index')}}"><button class="btn btn-sm btn-secondary">Atras</button></a>
