@extends('layouts.master')

@section('content')
  <div class="container main-container">
    <div class="row row-no-padding content-content">
      <div class="col-xs-8 content-left-container">
        <div class="primary-image-container">
          <img src="{{ assets_url('images/cover-letter.jpg') }}" alt="Cover Letter">
        </div>
      </div>
      <div class="col-xs-4 content-right-container">
        @include('_partials.content-menu')

        <ul class="topic-list">
          <li class="topic-item">
            <h3>A</h3>
            <ul class="title-list">
              <li class="title"><a href="{{ route('content.topic', 'aliter') }}">Aliter</a></li>
              <li class="title"><a href="{{ route('content.topic', 'averbum-prepositum') }}">Averbum Praepositum</a></li>
            </ul>
          </li>
          <li class="topic-item">
            <h3>B</h3>
            <ul class="title-list">
              <li class="title"><a href="{{ route('content.topic', 'bapak') }}">Bapak</a></li>
              <li class="title"><a href="#">Bit proverbia non</a></li>
              <li class="title"><a href="#">Byrrhonem</a></li>
            </ul>
          </li>
          <li class="topic-item">
            <h3>C</h3>
            <ul class="title-list">
              <li class="title"><a href="#">Cui autem esse poteris</a></li>
              <li class="title"><a href="#">Crimum longius verbum praepositum quam bonum</a></li>
            </ul>
          </li>
          <li class="topic-item">
            <h3>D</h3>
            <ul class="title-list">
              <li class="title"><a href="#">Dolor sit amet</a></li>
              <li class="title"><a href="#">Draepositum quam bonum</a></li>
              <li class="title"><a href="#">Drarvi enim primo ortu sic iacent</a></li>
              <li class="title"><a href="#">Dtamquam omnino sine animo sint</a></li>
            </ul>
          </li>
          <li class="topic-item">
            <h3>E</h3>
            <ul class="title-list">
              <li class="title"><a href="#">Earistonem eorumve</a></li>
              <li class="title"><a href="#">Eit proverbia non</a></li>
              <li class="title"><a href="#">Eirrhonem</a></li>
              <li class="title"><a href="#">Eutem esse poteris</a></li>
              <li class="title"><a href="#">Eongius verbum praepositum quam bonum</a></li>
            </ul>
          </li>
        </ul>
        <a href="{{ URL::previous() }}" class="return-btn">Kembali Ke Depan</a>
      </div>
    </div>
  </div>
@stop