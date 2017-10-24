<div class="card col-md-12">
  <div class="card-header categorias">
    Categorias
  </div>
  <div class="card-body">
    <table class="table">
      <tbody>
        @foreach ($categories as $category)
        <tr>
          <td class="card-text">
            <a href="{{ route('front.search.category',$category->name) }}">
              {{$category->name}}
              <span class="badge badge-dark">
                {{$category->article->count()}}
              </span>
            </a>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
<div class="card col-md-12">
  <div class="card-header tags">
    Tags
  </div>
  <div class="card-body">
    <table class="table">
      <tbody>
        <tr>
          <td>
          @foreach ($tags as $tag)
            <a href="{{ route('front.search.tag',$tag->name) }}">
              <span class="badge badge-primary">{{$tag->name}} - {{$tag->article->count()}}</span>
            </a>
          @endforeach
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
