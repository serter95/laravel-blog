@extends('admin.template.main')

@section('title','Lista de Artículos')

@section('content')
  <a href="{{ route('articles.create') }}" class="btn btn-primary">Registrar Nuevo Artículo</a>
  <!-- BUSCADOR DE TAGS -->
    {!! Form::open(['route'=>'articles.index', 'method'=>'GET', 'class'=>'navbar-form barraBusqueda float-right']) !!}
      <div class="input-group">
        {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Buscar Título', 'aria-describedby'=>'basic-addon2']) !!}
        <span class="input-group-addon" id="basic-addon2"><i class="ion-android-search"></i></span>
      </div>
    {!! Form::close() !!}
    <!-- FIN BUSCADOR DE TAGS -->
    <br><br>
  <table class="table table-hover">
    <thead class="thead-inverse">
      <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Categoría</th>
        <th>Usuario</th>
        <th>Acción</th>
      </tr>
    </thead>
    <tbody>
      @if ($articles->count())
        @foreach ($articles as $article)
          <tr>
            <th scope="row">{{$article->id}}</th>
            <td>{{$article->title}}</td>
            <td>{{$article->category->name}}</td>
            <td>{{$article->user->name}}</td>
            <td>
              <a href="{{ route('articles.show', $article) }}" class="btn btn-secondary"><i class="ion-android-list"></i></a>
              <a href="{{ route('articles.edit', $article) }}" class="btn btn-info"><i class="ion-edit"></i></a>
              <a href="#" data-toggle="modal" data-target="#elimModal" onclick="formularioEliminar({{ $article->id }})" class="btn btn-danger"><i class="ion-ios-trash"></i></a>
              <input type="hidden" id="nombre{{$article->id}}" value="{{$article->title}}">
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

  @if ($articles->count())
    <nav aria-label="Page navigation example">
      {{ $articles->links() }}
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
          {!! Form::open(['route'=>['articles.destroy', $article], 'method'=>'DELETE', 'id'=>'FormEliminar']) !!}
            <div class="modal-body">
              ¿Desea eliminar el Artículo <b id="nombreElimina"></b>?
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
