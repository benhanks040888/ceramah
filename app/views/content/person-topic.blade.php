@extends('layouts.master')

@section('content')
  <div class="container main-container">
    <div class="row row-no-padding content-content">
      <div class="col-xs-8 content-left-container">
        <div class="primary-image-container">
          <img src="{{ $person == 'bapak' ? assets_url('images/cover-letter.jpg') : assets_url('images/cover-letter-ibu.jpg') }}" alt="Cover Letter">
        </div>
      </div>
      <div class="col-xs-4 content-right-container">
        @include('_partials.content-menu')

        <ul class="topic-list topic-list-with-id custom-scrollbar">
          <li class="topic-item">
            <h3>Aim</h3>
            <ul class="title-list">
              <li class="title"><a href="{{ route('content.detail', array('aim', 'RAH020ENG')) }}">Aim, General <span class="item-meta-id">RAH020ENG</span></a></li>
              <li class="title"><a href="{{ route('content.detail', array('aim', 'RAH023ENG')) }}">Aim, Khusus <span class="item-meta-id">RAH023ENG</span></a></li>
            </ul>
          </li>

          <li class="topic-item">
            <h3>Baca</h3>
            <ul class="title-list">
              <li class="title"><a href="{{ route('content.detail', array('baca', 'SUB001IN')) }}">Baca, General <span class="item-meta-id">SUB001IN</span></a></li>
              <li class="title"><a href="{{ route('content.detail', array('baca', 'SUB001EN')) }}">Baca, Khusus <span class="item-meta-id">SUB001EN</span></a></li>
            </ul>
          </li>
        </ul>
        <a href="{{ route('main') }}" class="return-btn">{{ getLang() == 'en' ? 'Back' : 'Kembali ke depan' }}</a>
      </div>
    </div>
  </div>
@stop