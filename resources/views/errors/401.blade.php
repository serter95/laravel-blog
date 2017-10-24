@extends('admin.template.main')

@section('title','Acceso Restringido')

@section('content')
  <div class="card">
  <span class="restringido">
    <i class="ion-ios-locked"></i>
  </span>
  <div class="card-body">
    <h4 class="card-title">Acceso Restringido</h4>
    <p class="card-text">Usted no tiene acceso a este sitio.</p>
    <a href="{{route('welcome')}}">Volver al inicio</a>
  </div>
</div>
@endsection
