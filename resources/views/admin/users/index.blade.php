@extends('admin.template.main')

@section('title','lista de Usuario')

@section('content')
  <a href="{{ route('users.create') }}" class="btn btn-primary">Registrar Nuevo Usuario</a><br><br>
  <table class="table table-hover">
    <thead class="thead-inverse">
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Tipo</th>
        <th>Acción</th>
      </tr>
    </thead>
    <tbody>
      @if ($users->count())
        @foreach ($users as $user)
          <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
              @if ($user->type=='admin')
                <span class="badge badge-success">{{$user->type}}</span>
              @else
                <span class="badge badge-secondary">{{$user->type}}</span>
              @endif
            </td>
            <td>
              <a href="{{ route('users.edit', $user) }}" class="btn btn-info"><i class="ion-edit"></i></a>
              <a href="#" data-toggle="modal" data-target="#elimModal" onclick="formularioEliminar({{ $user->id }})" class="btn btn-danger"><i class="ion-ios-trash"></i></a>
              <input type="hidden" id="nombre{{$user->id}}" value="{{$user->name}}">
            </td>
          </tr>
        @endforeach
      @else
        @include('admin.template.partials.no-data')
      @endif
    </tbody>
  </table>
  
  @if ($users->count())
    <nav aria-label="Page navigation example">
      {{ $users->links() }}
    </nav>

    <!-- Modal -->
    <div class="modal fade" id="elimModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="elimModalLabel">Eliminar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          {!! Form::open(['route'=>['users.destroy', $user], 'method'=>'DELETE', 'id'=>'FormEliminar']) !!}
            <div class="modal-body">
              ¿Desea eliminar el registro usuario <b id="nombreElimina"></b>?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              {!! Form::submit('Aceptar', ['class'=>'btn btn-primary']) !!}
            </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
    <!-- End Modal -->
  @endif
@endsection
