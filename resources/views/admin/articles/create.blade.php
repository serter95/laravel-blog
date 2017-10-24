@extends('admin.template.main')

@section('title', 'Crear Artículo')

@section('content')
  <div class="card">
    <div class="card-header">
      Crear Artículo
    </div>
    <div class="card-block">
      {!! Form::open(['route'=>'articles.store', 'method'=>'POST', 'files'=>true]) !!}
        <div class="form-group">
          {!! Form::label('title', 'Título') !!}
          {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Título del artículo', 'required']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('category_id', 'Categoría') !!}
          {!! Form::select('category_id', $categories, null, ['class'=>'form-control chosen-select', 'placeholder'=>'Seleccione una categoría', 'required']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('content', 'Título') !!}
          {!! Form::textarea('content', null, ['class'=>'form-control', 'placeholder'=>'Contenido del artículo', 'required']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('tags', 'Tag') !!}
          {!! Form::select('tags[]', $tags, null, ['class'=>'form-control chosen-select', 'multiple', 'data-placeholder'=>"Seleccione un maximo de 3 Tag"]) !!}
        </div>
        <div class="form-group">
          {!! Form::label('image', 'Imagen') !!}
          {!! Form::file('image', ['class'=>'form-control', 'placeholder'=>'imagen del artículo', 'required']) !!}
        </div>
        <div class="form-group">
          {!! Form::submit('Registrar', ['class'=>'btn btn-primary']) !!}
          {!! Form::reset('Limpiar', ['class'=>'btn btn-secondary']) !!}
        </div>
      {!! Form::close() !!}
    </div>
  </div>
@endsection
