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
    <link rel="stylesheet" href="{{ asset('plugins/chosen_v1.8.2/chosen.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/Trumbowyg-master/dist/ui/trumbowyg.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
  </head>
  <body>
    @include('admin.template.partials.nav')
    <section>
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          @include('flash::message')
          @include('admin.template.partials.errors')
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
    <script type="text/javascript" src="{{asset('plugins/chosen_v1.8.2/chosen.jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/Trumbowyg-master/dist/trumbowyg.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/Trumbowyg-master/dist/langs/es.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/funciones.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/vue/vue.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/axios/axios.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/vue.js')}}"></script>
  </body>
</html>
