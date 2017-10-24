@extends('admin.template.main')

@section('title','lista de Categorias')

@section('content')
  <a href="{{ route('categories.create') }}" class="btn btn-primary">Registrar Nueva Categoria</a><br><br>
  <table class="table table-hover">
    <thead class="thead-inverse">
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acción</th>
      </tr>
    </thead>
    <tbody>
      @if ($categories->count())
        @foreach ($categories as $category)
          <tr>
            <th scope="row">{{$category->id}}</th>
            <td>{{$category->name}}</td>
            <td>
              <a href="{{ route('categories.edit', $category) }}" class="btn btn-info"><i class="ion-edit"></i></a>
              <a href="#" data-toggle="modal" data-target="#elimModal" onclick="formularioEliminar({{ $category->id }})" class="btn btn-danger"><i class="ion-ios-trash"></i></a>
              <input type="hidden" id="nombre{{$category->id}}" value="{{$category->name}}">
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

  @if ($categories->count())
    <nav aria-label="Page navigation example">
      {{ $categories->links() }}
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
          {!! Form::open(['route'=>['categories.destroy', $category], 'method'=>'DELETE', 'id'=>'FormEliminar']) !!}
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
