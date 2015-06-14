@extends('layouts.master')

@section('content')
  <div class="container main-container">
    <div class="row row-no-padding content-content">
      <div class="col-xs-8 content-left-container">
        @if($person === 'ibu-rahayu')
		<div class="primary-image-container">
          <img src="{{ assets_url('images/rahayu-large.jpg') }}" alt="Rahayu Wiryohudoyo">
        </div>
		<a href="{{ route('person.browse', 'ibu-rahayu') }}">
          <div class="image-panel">
            <h2>
              <span>Surat dan ceramah-ceramah pilihan dari </span><br>
              Ibu Rahayu Wiryohudoyo
            </h2>
          </div>
        </a>
		@else
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
		@endif
      </div>
      <div class="col-xs-4 content-right-container">
        @include('_partials.content-menu')

        <ul class="menu-list">
          <li class="menu-item">
            <a data-toggle="collapse" href="#suratCollapse" aria-expanded="false" aria-controls="suratCollapse">Surat-surat pilihan dari @if($person === 'ibu-rahayu') Ibu Rahayu Wiryohudoyo @else Bapak Muhammad Subuh Sumohadiwdjojo @endif</a>
          </li>
          <div class="collapse" id="suratCollapse">
            <ul class="alphabet-list">
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'surat', 'A')) }}">A</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'surat', 'B')) }}">B</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'surat', 'C')) }}">C</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'surat', 'D')) }}">D</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'surat', 'E')) }}">E</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'surat', 'F')) }}">F</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'surat', 'G')) }}">G</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'surat', 'H')) }}">H</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'surat', 'I')) }}">I</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'surat', 'J')) }}">J</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'surat', 'K')) }}">K</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'surat', 'L')) }}">L</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'surat', 'M')) }}">M</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'surat', 'N')) }}">N</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'surat', 'O')) }}">O</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'surat', 'P')) }}">P</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'surat', 'Q')) }}">Q</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'surat', 'R')) }}">R</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'surat', 'S')) }}">S</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'surat', 'T')) }}">T</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'surat', 'U')) }}">U</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'surat', 'V')) }}">V</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'surat', 'W')) }}">W</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'surat', 'X')) }}">X</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'surat', 'Y')) }}">Y</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'surat', 'Z')) }}">Z</a></li>
              <li class="alphabet-item view-all-item"><a href="{{ route('person.topic.list', array($person, 'surat')) }}">Lihat Semua Pilihan</a></li>
            </ul>
          </div>
          <li class="menu-item">
            <a data-toggle="collapse" href="#ceramahCollapse" aria-expanded="false" aria-controls="ceramahCollapse">Ceramah-ceramah dari @if($person === 'ibu-rahayu') Ibu Rahayu Wiryohudoyo @else Bapak Muhammad Subuh Sumohadiwdjojo @endif</a>
          </li>
          <div class="collapse" id="ceramahCollapse">
            <ul class="alphabet-list">
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'ceramah', 'A')) }}">A</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'ceramah', 'B')) }}">B</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'ceramah', 'C')) }}">C</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'ceramah', 'D')) }}">D</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'ceramah', 'E')) }}">E</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'ceramah', 'F')) }}">F</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'ceramah', 'G')) }}">G</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'ceramah', 'H')) }}">H</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'ceramah', 'I')) }}">I</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'ceramah', 'J')) }}">J</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'ceramah', 'K')) }}">K</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'ceramah', 'L')) }}">L</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'ceramah', 'M')) }}">M</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'ceramah', 'N')) }}">N</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'ceramah', 'O')) }}">O</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'ceramah', 'P')) }}">P</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'ceramah', 'Q')) }}">Q</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'ceramah', 'R')) }}">R</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'ceramah', 'S')) }}">S</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'ceramah', 'T')) }}">T</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'ceramah', 'U')) }}">U</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'ceramah', 'V')) }}">V</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'ceramah', 'W')) }}">W</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'ceramah', 'X')) }}">X</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'ceramah', 'Y')) }}">Y</a></li>
              <li class="alphabet-item"><a href="{{ route('person.init.list', array($person, 'ceramah', 'Z')) }}">Z</a></li>
              <li class="alphabet-item view-all-item"><a href="{{ route('person.topic.list', array($person, 'ceramah')) }}">Lihat Semua Pilihan</a></li>
            </ul>
          </div>
        </ul>
        <a href="{{ route('main') }}" class="return-btn">Kembali Ke Depan</a>
      </div>
    </div>
  </div>
@stop