@extends('admin.template.main')

@section('title', 'Editar Tag '.$tag->name)

@section('content')
  <div class="card">
    <div class="card-header">
      Editar Tag {{$tag->name}}
    </div>
    <div class="card-block">
      {!! Form::open(['route'=>['tags.update',$tag], 'method'=>'PUT']) !!}
        <div class="form-group">
          {!! Form::label('name', 'Nombre') !!}
          {!! Form::text('name', $tag->name, ['class'=>'form-control', 'placeholder'=>'Nombre del tag', 'required']) !!}
        </div>
        <div class="form-group">
          {!! Form::submit('Editar', ['class'=>'btn btn-primary']) !!}
          {!! Form::reset('Limpiar', ['class'=>'btn btn-secondary']) !!}
        </div>
      {!! Form::close() !!}
    </div>
  </div>
@endsection
