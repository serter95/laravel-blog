@extends('admin.template.main')

@section('title', 'Api-Vue')

@section('content')
  <div id="main" class="container">
    <div class="row">
      <div class="col-sm-12">
        <ul>
          <li v-for="item in people" v-text="item"></li>
        </ul>
        <input type="text" v-model="name" @keyup.enter="addName">
        <hr>
        <input type="text" v-model="info">
        <p :title="info" >Texto de relleno... @{{ info }}</p>
        <hr>
      </div>
      <div class="col-sm-4 ">
        <h1>Lista VUEjs - AJAX</h1>
        <ul class="list-group">
          <li v-for="item in lists" class="list-group-item">
            @{{ item.name }} <strong>@{{ item.email }}</strong>
          </li>
        </ul>
      </div>
      <div class="col-sm-8 ">
        <h1>JSON</h1>
        <pre>@{{ $data }}</pre>
      </div>
    </div>
  </div>
@endsection
