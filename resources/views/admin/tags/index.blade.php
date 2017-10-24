@extends('admin.template.main')

@section('title','lista de Categorias')

@section('content')
  <a href="{{ route('tags.create') }}" class="btn btn-primary">Registrar Nuevo Tag</a>
  <!-- BUSCADOR DE TAGS -->
    {!! Form::open(['route'=>'tags.index', 'method'=>'GET', 'class'=>'navbar-form barraBusqueda float-right']) !!}
      <div class="input-group">
        {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Buscar Tag', 'aria-describedby'=>'basic-addon2']) !!}
        <span class="input-group-addon" id="basic-addon2"><i class="ion-android-search"></i></span>

      </div>
    {!! Form::close() !!}
    <!-- FIN BUSCADOR DE TAGS -->
    <br><br>
    <table class="table table-hover">
      <thead class="thead-inverse">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Acción</th>
        </tr>
      </thead>
      <tbody>
        @if ($tags->count())
          @foreach ($tags as $tag)
            <tr>
              <th scope="row">{{$tag->id}}</th>
              <td>{{$tag->name}}</td>
              <td>
                <a href="{{ route('tags.edit', $tag) }}" class="btn btn-info"><i class="ion-edit"></i></a>
                <a href="#" data-toggle="modal" data-target="#elimModal" onclick="formularioEliminar({{ $tag->id }})" class="btn btn-danger"><i class="ion-ios-trash"></i></a>
                <input type="hidden" id="nombre{{$tag->id}}" value="{{$tag->name}}">
              </td>
            </tr>
          @endforeach
        @else
          <tr>
            <td colspan="3">@include('admin.template.partials.no-data')</td>
          </tr>
        @endif
      </tbody>
    </table>

    @if ($tags->count())
      <nav aria-label="Page navigation example">
        {{ $tags->links() }}
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
            {!! Form::open(['route'=>['tags.destroy', $tag], 'method'=>'DELETE', 'id'=>'FormEliminar']) !!}
              <div class="modal-body">
                ¿Desea eliminar la Categoria <b id="nombreElimina"></b>?
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
