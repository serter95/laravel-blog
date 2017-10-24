@extends('admin.template.main')

@section('title', 'Editar Usuario '.$user->name)

@section('content')
  <div class="card">
    <div class="card-header">
      Editar Usuario {{$user->name}}
    </div>
    <div class="card-block">
      {!! Form::open(['route'=>['users.update', $user], 'method'=>'PUT']) !!}
        <div class="form-group">
          {!! Form::label('name', 'Nombre') !!}
          {!! Form::text('name', $user->name, ['class'=>'form-control', 'placeholder'=>'Nombre Completo', 'required']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('email', 'Correo Electrónico') !!}
          {!! Form::email('email', $user->email, ['class'=>'form-control', 'placeholder'=>'example@gmail.com', 'required']) !!}
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
          {!! Form::select('type', [''=>'Seleccione tipo de Usuario', 'member'=>'Miembro', 'admin'=>'Administrador'], $user->type, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="form-group">
          {!! Form::submit('Editar', ['class'=>'btn btn-primary']) !!}
          {!! Form::reset('Limpiar', ['class'=>'btn btn-secondary']) !!}
        </div>
      {!! Form::close() !!}
    </div>
  </div>
@endsection
