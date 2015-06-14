<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>@yield('title', Config::get('site.title'))</title>
    <meta name="description" content="@yield('description', Config::get('site.description'))">

    <link rel="canonical" href="{{ URL::current() }}">

    <meta name="base_url" content="{{ URL::to('/') }}">
    <meta name="_token" content="{{ csrf_token() }}" />

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ assets_url('css/vendors/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ assets_url('css/site.prefixed.min.css') }}?v={{ filemtime(public_path() . '/assets/css/site.prefixed.min.css') }}">

    @yield('styles')

    <link rel="author" href="{{ asset('humans.txt') }}">

    <script>
      window.base_url = '{{ URL::to('/') }}';
    </script>
  </head>
  <body>

    @include('_partials.header')
    
    @yield('content')

    @include('_partials.footer')

    <script src="{{ assets_url('js/vendors/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ assets_url('js/vendors/bootstrap.min.js') }}"></script>
    <script src="{{ assets_url('js/vendors/masonry.pkgd.min.js') }}"></script>
    <script src="{{ assets_url('js/vendors/jquery.mCustomScrollbar.js') }}"></script>
    <script src="{{ assets_url('js/vendors/jquery.mousewheel.js') }}"></script>
    <script src="{{ assets_url('js/site.min.js') }}?v={{ filemtime(public_path() . '/assets/js/site.min.js') }}"></script>

    @yield('scripts')

  </body>
</html>