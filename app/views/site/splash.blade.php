@extends('layouts.master')

@section('content')
  <div class="container main-container">
    <div class="content-main text-center">
      <div class="col-xs-8 col-xs-offset-2">
        <div class="copy-serif">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br>Curabitur egestas mi fermentum, luctus mauris quis, commodo est. <br>Curabitur in ante a neque cursus auctor eu ac felis. <br>In dolor felis, dapibus ut congue et, vestibulum sit amet libero.</p>
          <p>Maecenas ultrices suscipit sem, eu ultrices dui iaculis porta. <br>Phasellus ullamcorper nisi sit amet ante fermentum, sed accumsan dolor consequat. <br>Cras ultricies tempus lobortis. <br>Nulla facilisi. <br>Sed non luctus massa, a egestas dolor.</p>
          <p>Cras egestas diam eu tortor consectetur mattis. <br>Vivamus ut massa vel lectus vulputate fringilla ac a velit. <br>Integer ac diam a turpis mollis egestas. <br>Fusce aliquet, purus ac lobortis sagittis, quam metus dapibus erat, id lobortis quam ligula id eros. </p>
          <p><small>(Toronto, Canada, 20 Agustust 1979, 79 YYZ 10)</small></p>
        </div>

        <a href="{{ route('about') }}"><span class="label label-default">Tentang Bapak</span></a>
      </div>
    </div>
  </div>
@stop