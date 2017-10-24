@extends('front.template.main')

@section('title', 'Blog Online')

@section('content')
  @if ($articles->count())
    <div class="row">
      <div class="col-md-8">
        <h4>Ultimos Artículos</h4>
        @foreach ($articles as $article)
          <div class="card col-md-6 imagenes">
            <a href="{{route('front.view.article',$article->slug)}}" class="thumbnail">
              @foreach ($article->image as $image)
                <img class="card-img-top img-thumbnail" src="{{asset('/images/articles/'.$image->name)}}" alt="Imagen del Artículo">
              @endforeach
            </a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="{{route('front.view.article',$article->slug)}}" class="thumbnail">
                  {{$article->title}}
                </a>
                </h4>
              <div class="row">
                <div class="col-md-6">
                  <p class="card-text">
                    <a href="{{ route('front.search.category',$article->category->name) }}">
                      <span class="step size-24">
                        <i class="icon ion-folder"></i>
                      </span>
                      {{$article->category->name}}
                    </a>
                  </p>
                </div>
                <div class="col-md-6">
                  <p class="tiempo">
                    <span class="step size-24">
                      <i class="icon ion-ios-clock-outline"></i>
                    </span>
                    {{$article->created_at->diffForHumans()}}
                  </p>
                </div>
              </div>
              @foreach ($article->tag as $tag)
                <a href="{{ route('front.search.tag',$tag->name) }}">
                  <span class="badge badge-primary">{{$tag->name}}</span>
                </a>
              @endforeach
            </div>
          </div>
        @endforeach
      </div>

      <div class="col-md-4">
        @include('front.partials.aside')
      </div>
    </div>
    <nav aria-label="Page navigation example">
      {{ $articles->links() }}
    </nav>
  @else
    @include('admin.template.partials.no-data')
  @endif
@endsection
