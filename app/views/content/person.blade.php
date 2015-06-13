@extends('layouts.master')

@section('content')
  <div class="container main-container">
    <div class="row row-no-padding content-content">
      <div class="col-xs-8 content-left-container">
        <div class="primary-image-container">
          <img src="{{ $person == 'bapak' ? assets_url('images/m-subuh-large.jpg') : assets_url('images/rahayu-large.jpg') }}" alt="{{ $person == 'bapak' ? 'Bapak Muhammad Subuh Sumohadiwidjojo' : 'Ibu Siti Rahayu Wiryohudoyo' }}">
        </div>
        <div class="image-panel">
          <h2>
            <span>{{ getLang() == 'en' ? 'Selected letters and talks from' : 'Surat dan ceramah-ceramah pilihan dari' }}</span><br>
            {{ $person == 'bapak' ? 'Bapak Muhammad Subuh Sumohadiwidjojo' : 'Ibu Siti Rahayu Wiryohudoyo' }}
          </h2>
        </div>
      </div>
      <div class="col-xs-4 content-right-container">
        @include('_partials.content-menu')

        <ul class="menu-list">
          <li class="menu-item">
            <a data-toggle="collapse" href="#suratCollapse" aria-expanded="false" aria-controls="suratCollapse">{{ getLang() == 'en' ? 'Selected letters from' : 'Surat-surat pilihan dari' }}  {{ $person == 'bapak' ? 'Bapak Muhammad Subuh Sumohadiwdjojo' : 'Ibu Siti Rahayu Wiryohudoyo' }}</a>
          </li>
          <div class="collapse" id="suratCollapse">
            <ul class="alphabet-list">
              <li class="alphabet-item"><a href="">A</a></li>
              <li class="alphabet-item"><a href="">B</a></li>
              <li class="alphabet-item"><a href="">C</a></li>
              <li class="alphabet-item"><a href="">D</a></li>
              <li class="alphabet-item"><a href="">E</a></li>
              <li class="alphabet-item"><a href="">F</a></li>
              <li class="alphabet-item"><a href="">G</a></li>
              <li class="alphabet-item"><a href="">H</a></li>
              <li class="alphabet-item"><a href="">I</a></li>
              <li class="alphabet-item"><a href="">J</a></li>
              <li class="alphabet-item"><a href="">K</a></li>
              <li class="alphabet-item"><a href="">L</a></li>
              <li class="alphabet-item"><a href="">M</a></li>
              <li class="alphabet-item"><a href="">N</a></li>
              <li class="alphabet-item"><a href="">O</a></li>
              <li class="alphabet-item"><a href="">P</a></li>
              <li class="alphabet-item"><a href="">Q</a></li>
              <li class="alphabet-item"><a href="">R</a></li>
              <li class="alphabet-item"><a href="">S</a></li>
              <li class="alphabet-item"><a href="">T</a></li>
              <li class="alphabet-item"><a href="">U</a></li>
              <li class="alphabet-item"><a href="">V</a></li>
              <li class="alphabet-item"><a href="">W</a></li>
              <li class="alphabet-item"><a href="">X</a></li>
              <li class="alphabet-item"><a href="">Y</a></li>
              <li class="alphabet-item"><a href="">Z</a></li>
              <li class="alphabet-item view-all-item"><a href="{{ route('person.topic.list', array($who, 'surat')) }}">Lihat Semua Pilihan</a></li>
            </ul>
          </div>
          <li class="menu-item">
            <a data-toggle="collapse" href="#ceramahCollapse" aria-expanded="false" aria-controls="ceramahCollapse">{{ getLang() == 'en' ? 'Selected talks from' : 'Ceramah-ceramah dari' }}  {{ $person == 'bapak' ? 'Bapak Muhammad Subuh Sumohadiwdjojo' : 'Ibu Siti Rahayu Wiryohudoyo' }}</a>
          </li>
          <div class="collapse" id="ceramahCollapse">
            <ul class="alphabet-list">
              <li class="alphabet-item"><a href="">A</a></li>
              <li class="alphabet-item"><a href="">B</a></li>
              <li class="alphabet-item"><a href="">C</a></li>
              <li class="alphabet-item"><a href="">D</a></li>
              <li class="alphabet-item"><a href="">E</a></li>
              <li class="alphabet-item"><a href="">F</a></li>
              <li class="alphabet-item"><a href="">G</a></li>
              <li class="alphabet-item"><a href="">H</a></li>
              <li class="alphabet-item"><a href="">I</a></li>
              <li class="alphabet-item"><a href="">J</a></li>
              <li class="alphabet-item"><a href="">K</a></li>
              <li class="alphabet-item"><a href="">L</a></li>
              <li class="alphabet-item"><a href="">M</a></li>
              <li class="alphabet-item"><a href="">N</a></li>
              <li class="alphabet-item"><a href="">O</a></li>
              <li class="alphabet-item"><a href="">P</a></li>
              <li class="alphabet-item"><a href="">Q</a></li>
              <li class="alphabet-item"><a href="">R</a></li>
              <li class="alphabet-item"><a href="">S</a></li>
              <li class="alphabet-item"><a href="">T</a></li>
              <li class="alphabet-item"><a href="">U</a></li>
              <li class="alphabet-item"><a href="">V</a></li>
              <li class="alphabet-item"><a href="">W</a></li>
              <li class="alphabet-item"><a href="">X</a></li>
              <li class="alphabet-item"><a href="">Y</a></li>
              <li class="alphabet-item"><a href="">Z</a></li>
              <li class="alphabet-item view-all-item"><a href="{{ route('person.topic.list', array($who, 'ceramah')) }}">Lihat Semua Pilihan</a></li>
            </ul>
          </div>
        </ul>

        <a href="{{ route('main') }}" class="return-btn">{{ getLang() == 'en' ? 'Back' : 'Kembali ke depan' }}</a>
      </div>
    </div>
  </div>
@stop