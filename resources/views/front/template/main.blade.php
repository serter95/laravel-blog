<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Default') | Panel de Administración</title>
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
  </head>
  <body>
    @include('front.template.partials.nav')
    <section>
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          @yield('content')
        </div>
      </div>
    </section>

    <footer class="footer">
      @include('admin.template.partials.footer')
    </footer>

    <script type="text/javascript" src="{{asset('plugins/jquery/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/bootstrap/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/funciones.js')}}"></script>
  </body>
</html>
