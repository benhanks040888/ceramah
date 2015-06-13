@extends('layouts.master')

@section('content')
  <div class="container main-container">
    <div class="row content-about">
      <div class="section-navigation-container">
        <a href="{{ route('splash') }}" class="section-link prev-section"></a>
        <a href="{{ route('gallery') }}" class="section-link next-section"></a>
      </div>

      <figure class="col-xs-5 col-no-padding featured-image">
        <img src="{{ assets_url('images/m-subuh.jpg') }}" alt="Muhammad Subuh Sumohadiwidjojo">
      </figure>
      <div class="col-xs-7 intro-right-container">
        <header><h1><span>Tentang</span><br>Bapak Muhammad Subuh Sumohadiwidjojo</h1></header>
        <div class="copy-base custom-scrollbar">
          {{$content}}
        </div>
        <nav class="bottom-navigation">
          <ul>
            <li><a href="{{ route('about') }}"><span class="label label-default">Tentang Bapak</span></a></li>
            <li><a href="{{ route('gallery') }}"><span class="label label-default">Photo Gallery</span></a></li>
            <li><a href="{{ route('disclaimer') }}"><span class="label label-default">Go To Surat dan Ceramah</span></a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
@stop