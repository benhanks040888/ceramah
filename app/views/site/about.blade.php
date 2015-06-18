@extends('layouts.master')

@section('content')
  <div class="container main-container">
    <div class="row content-about">
      <figure class="col-xs-5 col-no-padding featured-image">
        <img src="{{ assets_url('images/m-subuh.jpg') }}" alt="Muhammad Subuh Sumohadiwidjojo">
      </figure>
      <div class="col-xs-7 intro-right-container">
        <header>
          <h1>
            <span>
              @if (getLang() == 'en')
                About Bapak Muhammad Subuh Sumohadiwidjojo and
              @else
                Tentang Bapak Muhammad Subuh Sumohadiwidjojo dan
              @endif
            </span><br>
            @if (getLang() == 'en')
              The origin of Latihan Kejiwaan of Subud
            @else
              Awal Latihan Kejiwaan Subud
            @endif
          </h1>
        </header>
        <div class="copy-base custom-scrollbar">
          {{$content}}
        </div>
        <nav class="bottom-navigation">
          <ul>
            <li><a href="{{ route('about') }}"><span class="label label-default">{{ getLang() == 'en' ? 'About Bapak' : 'Tentang Bapak' }}</span></a></li>
            <li><a href="{{ route('gallery') }}"><span class="label label-default">Photo Gallery</span></a></li>
            <li><a href="{{ route('disclaimer') }}"><span class="label label-default">{{ getLang() == 'en' ? 'Go to Talks & Letters' : 'Go to Surat dan Ceramah' }}</span></a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
@stop