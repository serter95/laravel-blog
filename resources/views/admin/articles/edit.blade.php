@extends('admin.template.main')

@section('title', 'Editar Articulo')

@section('content')
  <div class="card">
    <div class="card-header">
      Editar Artículo {{$article->title}}
    </div>
    <div class="card-block">
      {!! Form::open(['route'=>['articles.update', $article], 'method'=>'PUT']) !!}
        <div class="form-group">
          {!! Form::label('title', 'Título') !!}
          {!! Form::text('title', $article->title, ['class'=>'form-control', 'placeholder'=>'Título del artículo', 'required']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('category_id', 'Categoría') !!}
          {!! Form::select('category_id', $categories, $article->category_id, ['class'=>'form-control chosen-select', 'placeholder'=>'Seleccione una categoría', 'required']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('content', 'Título') !!}
          {!! Form::textarea('content', $article->content, ['class'=>'form-control', 'placeholder'=>'Contenido del artículo', 'required']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('tags', 'Tag') !!}
          {!! Form::select('tags[]', $tags, $misTags, ['class'=>'form-control chosen-select', 'multiple', 'data-placeholder'=>"Seleccione un maximo de 3 Tag"]) !!}
        </div>
        <div class="form-group">
          {!! Form::submit('Editar', ['class'=>'btn btn-primary']) !!}
          {!! Form::reset('Limpiar', ['class'=>'btn btn-secondary']) !!}
        </div>
      {!! Form::close() !!}
    </div>
  </div>
@endsection
