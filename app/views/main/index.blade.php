@extends('layouts.master')

@section('content')
  <div class="container main-container">
    <div class="row row-no-padding content-content">
      <div class="col-xs-8 content-left-container">
        <div class="primary-image-container">
          <img src="{{ assets_url('images/m-subuh-large.jpg') }}" alt="Muhammad Subuh Sumohadiwidjojo">
        </div>
        <a href="{{ route('person.browse', 'bapak-subud') }}">
          <div class="image-panel">
            <h2>
              <span>Surat dan ceramah-ceramah pilihan dari </span><br>
              Bapak Muhammad Subuh Sumohadiwidjojo
            </h2>
          </div>
        </a>
      </div>
      <div class="col-xs-4 content-right-container">
        @include('_partials.content-menu')

        <ul class="menu-list">
          <li class="menu-item"><a href="{{ route('person.browse', 'bapak-subud') }}">Surat dan ceramah-ceramah pilihan dari Bapak Muhammad Subuh Sumohadiwdjojo</a></li>
          <li class="menu-item"><a href="{{ route('person.browse', 'ibu-rahayu') }}">Surat dan ceramah-ceramah pilihan dari Ibu Rahayu Wiryohudoyo</a></li>
          <li class="menu-item"><a href="{{ route('content.list') }}">Daftar topik Surat dan <br>ceramah-ceramah pilihan</a></li>
        </ul>
        <div class="secondary-image-container">
          <img src="{{ assets_url('images/rahayu.jpg') }}" alt="Rahayu">
        </div>
      </div>
    </div>
  </div>
@stop