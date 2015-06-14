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
		  @if(!$posts)
			@if(Cookie::get('subud_lang') === 'en')
			<li class="topic-item"><h3>No records found</h3></li>
			@else
			<li class="topic-item"><h3>Data tidak ditemukan</h3></li>
			@endif
		  @else
			  @foreach($posts as $title=>$postx)
			  <li class="topic-item">
				<h3>{{$title}}</h3>
				<ul class="title-list">
				  @foreach($postx as $post)
				  <li class="title"><a href="{{ route('content.detail', array($title, $post->code)) }}">{{$post->subtitle}} <span class="item-meta-id">{{$post->code}}</span></a></li>
				  @endforeach
				</ul>
			  </li>
			  @endforeach
		  @endif
        </ul>
        <a href="{{ route('main') }}" class="return-btn">Kembali Ke Depan</a>
      </div>
    </div>
  </div>
@stop