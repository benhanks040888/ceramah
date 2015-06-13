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
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br>Curabitur egestas mi fermentum, luctus mauris quis, commodo est. <br>Curabitur in ante a neque cursus auctor eu ac felis. <br>In dolor felis, dapibus ut congue et, vestibulum sit amet libero.</p>
          <p>Maecenas ultrices suscipit sem, eu ultrices dui iaculis porta. <br>Phasellus ullamcorper nisi sit amet ante fermentum, sed accumsan dolor consequat. <br>Cras ultricies tempus lobortis. <br>Nulla facilisi. <br>Sed non luctus massa, a egestas dolor.</p>
          <p>Cras egestas diam eu tortor consectetur mattis. <br>Vivamus ut massa vel lectus vulputate fringilla ac a velit. <br>Integer ac diam a turpis mollis egestas. <br>Fusce aliquet, purus ac lobortis sagittis, quam metus dapibus erat, id lobortis quam ligula id eros. </p>
          <p><small>(Toronto, Canada, 20 Agustust 1979, 79 YYZ 10)</small></p>
        </div>
      </div>
    </div>
  </div>
  <audio autoplay>
    <source src="{{ assets_url('audio/Fortaleza.mp3') }}" type="audio/mpeg">
    Your browser does not support the audio element.
  </audio>
@stop

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