@extends('admin.template.main')

@section('title', 'Listado de Imagenes')

@section('content')
  @if ($images->count())
    @foreach ($images as $image)
      <div class="card col-md-4 imagenes">
        <img class="card-img-top" src="/images/articles/{{$image->name}}" alt="Imagen del Artículo">
        <div class="card-body">
          <h4 class="card-title">{{$image->article->title}}</h4>
          <!--p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p-->
          <a href="{{route('articles.show', $image->article)}}" class="btn btn-primary">Ir al artículo</a>
        </div>
      </div>
    @endforeach
    <nav aria-label="Page navigation example">
      {{ $images->links() }}
    </nav>
  @else
    @include('admin.template.partials.no-data')
  @endif
@endsection
