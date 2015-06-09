@extends('layouts.master')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-7">
        <img src="http://placehold.it/700x500" alt="" class="img-responsive">
      </div>
      <div class="col-sm-5">
        @include('_partials.content-menu')

        <ul class="list-group">
          <li class="list-group-item">
            <a href="{{ route('person.topic.list', array($person, 'surat')) }}">
              <span class="fa-stack">
                <i class="fa fa-circle-thin fa-stack-2x"></i>
                <i class="fa fa-angle-right fa-stack-1x"></i>
              </span>
              Surat-surat pilihan dari Bapak Muhammad Subuh Sumohadiwidjojo
            </a>
          </li>
          <li class="list-group-item">
            <a href="{{ route('person.topic.list', array($person, 'ceramah')) }}">
              <span class="fa-stack">
                <i class="fa fa-circle-thin fa-stack-2x"></i>
                <i class="fa fa-angle-right fa-stack-1x"></i>
              </span>
              Ceramah-ceramah pilihan dari Bapak Muhammad Subuh Sumohadiwidjojo
            </a>
          </li>
        </ul>

        <a href="{{ URL::previous() }}">
          <i class="fa fa-chevron-left"></i> KEMBALI KE DEPAN
        </a>
      </div>
    </div>
  </div>
@stop