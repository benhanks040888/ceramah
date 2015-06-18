@extends('layouts.master')

@section('content')
  <div class="container main-container">
    <div class="row row-no-padding content-content">
      <div class="col-xs-8 content-left-container">
        <a href="{{ route('person.browse', 'bapak-subuh') }}" class="personal-page-link">
          <div class="primary-image-container">
            <img src="{{ assets_url('images/m-subuh-large.jpg') }}" alt="Muhammad Subuh Sumohadiwidjojo">
          </div>
          <div class="image-panel">
            <h2>
              <span>{{ getLang() == 'en' ? 'Selected letters and talks extract from' : 'Pilihan surat-surat dan ceramah-ceramah dari' }}</span><br>
              Bapak Muhammad Subuh Sumohadiwidjojo
            </h2>
          </div>
        </a>
      </div>
      <div class="col-xs-4 content-right-container">
        @include('_partials.content-menu')

        <ul class="menu-list">
          <li class="menu-item"><a href="{{ route('person.browse', 'bapak-subuh') }}">
            @if (getLang() == 'en')
              Selected letters and talks extract from Bapak Muhammad Subuh Sumohadiwdjojo
            @else
              Pilihan surat-surat dan ceramah-ceramah dari Bapak Muhammad Subuh Sumohadiwdjojo
            @endif
          </a></li>
          <li class="menu-item"><a href="{{ route('person.browse', 'ibu-rahayu') }}">
            @if (getLang() == 'en')
              Selected letters and talks extract from Ibu Rahayu Wiryohudoyo
            @else
              Pilihan surat-surat dan ceramah-ceramah dari Ibu Rahayu Wiryohudoyo
            @endif
          </a></li>
          <li class="menu-item"><a href="{{ route('content.list') }}">
            @if (getLang() == 'en')
              Selected letters and talks extract list
            @else
              Daftar topik Surat dan <br>ceramah-ceramah pilihan
            @endif
          </a></li>
        </ul>
        <a href="{{ route('person.browse', 'ibu-rahayu') }}" class="personal-page-link">
          <div class="secondary-image-container">
            <img src="{{ assets_url('images/rahayu.jpg') }}" alt="Rahayu">
          </div>
          <div class="image-panel image-panel-transparent">
            <h3>
              <span>{{ getLang() == 'en' ? 'Selected letters and talks extract from' : 'Pilihan surat-surat dan ceramah-ceramah dari' }}</span><br>
              Ibu Siti Rahayu Wiryohudoyo
            </h3>
          </div>
        </a>
      </div>
    </div>
  </div>
@stop