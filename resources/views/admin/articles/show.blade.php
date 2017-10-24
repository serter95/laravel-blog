@extends('admin.template.main')

@section('title', 'Ver Articulo')

@section('content')
  <div class="card">
    <div class="card-header">
      Ver Artículo {{$article->title}}
    </div>
    <div class="card-block">
        <div class="form-group">
          {!! Form::label('title', 'Título') !!}
          {!! Form::text('title', $article->title, ['class'=>'form-control', 'placeholder'=>'Título del artículo', 'disabled']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('category_id', 'Categoría') !!}
          {!! Form::select('category_id', $categories, $article->category_id, ['class'=>'form-control chosen-select', 'placeholder'=>'Seleccione una categoría', 'disabled']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('content', 'Título') !!}
          {!! Form::textarea('content', $article->content, ['class'=>'form-control', 'placeholder'=>'Contenido del artículo', 'disabled']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('tags', 'Tag') !!}
          {!! Form::select('tags[]', $tags, $misTags, ['class'=>'form-control chosen-select', 'multiple', 'data-placeholder'=>"Seleccione un maximo de 3 Tag", 'disabled']) !!}
        </div>
    </div>
  </div>
@endsection
