<br>
<div class="form-control alert-dark">
  <strong>{{ Form::label('title', 'Titulo')}}</strong>
</div>
{{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title'])}}
<br>
<div class="form-control alert-dark">
<strong>{{ Form::label('slug', 'URL Amigable')}}</strong>
</div>
{{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug'])}}
<hr>
{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary'])}}
{{Form::close()}}
<br>
<a href="{{route('posts.index')}}"><button class="btn btn-sm btn-secondary">Atras</button></a>
