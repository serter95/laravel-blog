@extends('admin.template.main')

@section('title', 'Editar Categoría '.$category->name)

@section('content')
  <div class="card">
    <div class="card-header">
      Editar Categoría {{$category->name}}
    </div>
    <div class="card-block">
      {!! Form::open(['route'=>['categories.update',$category], 'method'=>'PUT']) !!}
        <div class="form-group">
          {!! Form::label('name', 'Nombre') !!}
          {!! Form::text('name', $category->name, ['class'=>'form-control', 'placeholder'=>'Nombre de la categoria', 'required']) !!}
        </div>
        <div class="form-group">
          {!! Form::submit('Editar', ['class'=>'btn btn-primary']) !!}
          {!! Form::reset('Limpiar', ['class'=>'btn btn-secondary']) !!}
        </div>
      {!! Form::close() !!}
    </div>
  </div>
@endsection
