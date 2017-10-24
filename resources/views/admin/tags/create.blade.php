@extends('admin.template.main')

@section('title', 'Crear Categoría')

@section('content')
  <div class="card">
    <div class="card-header">
      Crear Tag
    </div>
    <div class="card-block">
      {!! Form::open(['route'=>'tags.store', 'method'=>'POST']) !!}
        <div class="form-group">
          {!! Form::label('name', 'Nombre') !!}
          {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nombre del Tag', 'required']) !!}
        </div>
        <div class="form-group">
          {!! Form::submit('Registrar', ['class'=>'btn btn-primary']) !!}
          {!! Form::reset('Limpiar', ['class'=>'btn btn-secondary']) !!}
        </div>
      {!! Form::close() !!}
    </div>
  </div>
@endsection
