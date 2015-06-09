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
          <h3>Aim</h3>

          <ul class="list-unstyled">
            <li><a href="{{ route('content.detail', array('aim', 'RAH020ENG')) }}">Aim, General <span>RAH020ENG</span></a></li>
            <li><a href="{{ route('content.detail', array('aim', 'RAH023ENG')) }}">Aim, Khusus <span>RAH023ENG</span></a></li>
          </ul>

          <h3>Baca</h3>

          <ul class="list-unstyled">
            <li><a href="{{ route('content.detail', array('baca', 'SUB001IN')) }}">Baca, General <span>SUB001IN</span></a></li>
            <li><a href="{{ route('content.detail', array('baca', 'SUB001EN')) }}">Baca, Khusus <span>SUB001EN</span></a></li>
          </ul>
        </div>

        <a href="{{ URL::previous() }}">
          <i class="fa fa-chevron-left"></i> KEMBALI KE DEPAN
        </a>
      </div>
    </div>
  </div>
@stop