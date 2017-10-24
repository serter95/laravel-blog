@extends('front.template.main')

@section('title', $article->title)

@section('content')
  <div class="row">
    <div class="col-md-8">
      <h4>{{$article->title}}</h4>
      <hr>
      <div class="info-articulo">
        <p class="card-text">
          <span class="step size-24">
            <i class="icon ion-folder"></i>
          </span>
          {{$article->category->name}}
          @foreach ($article->tag as $tag)
            <span class="badge badge-primary">{{$tag->name}}</span>
          @endforeach
        </p>
      </div>
      <div class="fondo-articulo">
        {!! $article->content !!}
      </div>
      <div>
        <p class="tiempo">
          <span class="step size-24">
            <i class="icon ion-ios-clock-outline"></i>
          </span>
          {{$article->created_at->diffForHumans()}}
        </p>
        <h4>Comentarios</h4>
        <div id="disqus_thread"></div>
        <script>
          /**
          *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
          *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
          /*
          var disqus_config = function () {
          this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
          this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
          };
          */
          (function() { // DON'T EDIT BELOW THIS LINE
          var d = document, s = d.createElement('script');
          s.src = 'https://blog-online.disqus.com/embed.js';
          s.setAttribute('data-timestamp', +new Date());
          (d.head || d.body).appendChild(s);
          })();
        </script>
        <noscript>Por favor habilite JavaScript para poder visualizar en contenido de los comentarios <a href="https://disqus.com/?ref_noscript">powered by Disqus.</a></noscript>
      </div>
    </div>

    <div class="col-md-4">
      @include('front.partials.aside')
    </div>
  </div>
@endsection
