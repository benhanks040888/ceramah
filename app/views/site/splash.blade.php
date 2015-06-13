@extends('layouts.master')

@section('content')
  <div class="container main-container">
    <div class="content-main text-center">
      <div class="section-navigation-container js-splash-nav">
        {{-- <a href="{{ route('home') }}" class="section-link prev-section"></a> --}}
        <a href="{{ route('about') }}" class="section-link next-section"></a>
      </div>
      <div class="col-xs-8 col-xs-offset-2 copy-wrapper">
        <div class="copy-serif">
          {{$content}}
        </div>
      </div>
    </div>
  </div>
  <audio autoplay>
    @if($music)
      <source src="{{$music}}" type="audio/mpeg">
    @endif
    Your browser does not support the audio element.
  </audio>
@stop

@if($music)
  @section('scripts')
    <script>
      $(function() {
        $('.js-splash-nav').hide();

        setInterval(function () {
          $('.js-splash-nav').fadeIn('slow');
        }, 30000);
      });
    </script>
  @stop
@endif