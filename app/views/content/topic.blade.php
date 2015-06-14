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

        <ul class="topic-list topic-list-with-id custom-scrollbar">
          <li class="topic-item">
            <h3>{{$title}}</h3>
            <ul class="title-list">
              @foreach($posts as $post)
                <li class="title"><a href="{{ route('content.detail', array($title, $post->code)) }}">{{getLang() == 'en' ?$post->subtitle_en:$post->subtitle}} <span class="item-meta-id">{{getLang() == 'en' ?$post->code_en:$post->code}}</span></a></li>
              @endforeach
            </ul>
          </li>
        </ul>
        <a href="{{ route('content.list') }}" class="return-btn">{{ getLang() == 'en' ? 'Back' : 'Kembali ke depan' }}</a>
      </div>
    </div>
  </div>
@stop