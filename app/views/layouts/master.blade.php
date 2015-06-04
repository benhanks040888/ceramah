<!doctype html>
<html lang="en" xmlns:fb="http://ogp.me/ns/fb#">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>@yield('title', Config::get('site.title'))</title>
    <meta name="description" content="@yield('description', Config::get('site.description'))">
    
    @section('og')
<meta property="fb:app_id" content="{{ Config::get('facebook.appId') }}" />

    <meta property="og:site_name" content="{{ Config::get('site.name') }}" /> 
    <meta property="og:url" content="{{ URL::current() }}" /> 
    <meta property="og:title" content="@yield('og:title', Config::get('site.title'))" /> 
    <meta property="og:description" content="@yield('description', Config::get('site.description'))" /> 
    <meta property="og:image" content="@yield('og:image', Config::get('site.default_image') )" />
    @show

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
  <body class="debug">

    <div id="fb-root"></div>

    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId: '{{ Config::get('facebook.appId') }}',
          status: true,
          cookie: true,
          xfbml: true,
          oauth: true,
          // version: 'v2.0'
        });
      };

      (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>

    @include('_partials.header')
    
    @yield('content')

    @include('_partials.footer')

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="{{ str_replace('/', '\/', assets_url('js/vendors/jquery-1.11.0.min.js')) }}"><\/script>')</script>

    <script src="{{ assets_url('js/vendors/bootstrap.min.js') }}"></script>
    <script src="{{ assets_url('js/site.min.js') }}?v={{ filemtime(public_path() . '/assets/js/site.min.js') }}"></script>

    @yield('scripts')

  </body>
</html>