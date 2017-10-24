@extends('admin.template.main')

@section('title', 'Crear Usuario')

@section('content')
  <div class="card">
    <div class="card-header">
      Crear Usuario
    </div>
    <div class="card-block">
      {!! Form::open(['route'=>'users.store', 'method'=>'POST']) !!}
        <div class="form-group">
          {!! Form::label('name', 'Nombre') !!}
          {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nombre Completo', 'required']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('email', 'Correo Electrónico') !!}
          {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'example@gmail.com', 'required']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('password', 'Contraseña') !!}
          {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'contraseña', 'required']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('repeatPassword', 'Repita Contraseña') !!}
          {!! Form::password('repeatPassword', ['class'=>'form-control', 'placeholder'=>'repita contraseña', 'required']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('type', 'Tipo') !!}
          {!! Form::select('type', [''=>'Seleccione tipo de Usuario', 'member'=>'Miembro', 'admin'=>'Administrador'], null, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="form-group">
          {!! Form::submit('Registrar', ['class'=>'btn btn-primary']) !!}
          {!! Form::reset('Limpiar', ['class'=>'btn btn-secondary']) !!}
        </div>
      {!! Form::close() !!}
    </div>
  </div>
@endsection
