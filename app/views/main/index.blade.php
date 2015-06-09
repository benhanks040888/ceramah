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
            <a href="{{ route('person.browse', 'bapak-subud') }}">
              <span class="fa-stack">
                <i class="fa fa-circle-thin fa-stack-2x"></i>
                <i class="fa fa-angle-right fa-stack-1x"></i>
              </span>
              Surat dan ceramah-ceramah pilihan dari Bapak Muhammad Subuh Sumohadiwidjojo
            </a>
          </li>
          <li class="list-group-item">
            <a href="{{ route('person.browse', 'ibu-rahayu') }}">
              <span class="fa-stack">
                <i class="fa fa-circle-thin fa-stack-2x"></i>
                <i class="fa fa-angle-right fa-stack-1x"></i>
              </span>
              Surat dan ceramah-ceramah Pilihan dari Ibu Rahayu Wiryohudoyo
            </a>
          </li>
          <li class="list-group-item">
            <a href="{{ route('content.list') }}">
              <span class="fa-stack">
                <i class="fa fa-circle-thin fa-stack-2x"></i>
                <i class="fa fa-angle-right fa-stack-1x"></i>
              </span>
              Daftar topik surat dan ceramah-ceramah pilihan
            </a>
          </li>
        </ul>
        <img src="http://placehold.it/200x200" alt="" class="img-responsive">
      </div>
    </div>
  </div>
@stop