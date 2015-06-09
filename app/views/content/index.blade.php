@extends('layouts.master')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-7">
        <img src="http://placehold.it/700x500" alt="" class="img-responsive">
      </div>
      <div class="col-sm-5">
        @include('_partials.content-menu')

        <div class="content-list">
          <h3>A</h3>

          <ul class="list-unstyled">
            <li><a href="{{ route('content.topic', 'aim') }}">Aim</a></li>
            <li><a href="{{ route('content.topic', 'ancestor') }}">Ancestor</a></li>
          </ul>

          <h3>B</h3>

          <ul class="list-unstyled">
            <li><a href="{{ route('content.topic', 'bapak') }}">Bapak</a></li>
            <li><a href="{{ route('content.topic', 'barisan') }}">Barisan</a></li>
          </ul>
        </div>

        <a href="{{ URL::previous() }}">
          <i class="fa fa-chevron-left"></i> KEMBALI KE DEPAN
        </a>
      </div>
    </div>
  </div>
@stop