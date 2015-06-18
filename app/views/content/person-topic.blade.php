@extends('layouts.master')

@section('content')
  <div class="container main-container">
    <div class="row row-no-padding content-content">
      <div class="col-xs-8 content-left-container">
        <div class="primary-image-container">
          @if ($type == 'surat')
            <img src="{{ $post_person == 'bapak' ? assets_url('images/cover-letter.jpg') : assets_url('images/cover-letter-ibu.jpg') }}" alt="Cover Letter">
          @elseif ($type == 'ceramah')
            <img src="{{ $post_person == 'bapak' ? assets_url('images/ceramah-bapak.jpg') : assets_url('images/ceramah-ibu.jpg') }}" alt="Ceramah">
          @endif
        </div>
      </div>
      <div class="col-xs-4 content-right-container">
        @include('_partials.content-menu')

        <ul class="topic-list topic-list-with-id custom-scrollbar">
		  @if(!$posts)
			<li class="topic-item"><h3>{{getLang() == 'en' ? 'No records found':'Data tidak ditemukan'}}</h3></li>
		  @else
			  @foreach($posts as $title=>$postx)
			  <li class="topic-item">
				<h3>{{$title}}</h3>
				<ul class="title-list">
				  @foreach($postx as $post)
				  <li class="title"><a href="{{getLang() == 'en' ?route('content.detail', array($title, $post->code_en)):route('content.detail', array($title, $post->code)) }}">{{getLang() == 'en' ?$post->subtitle_en:$post->subtitle}} <span class="item-meta-id">{{getLang() == 'en' ?$post->code_en:$post->code}}</span></a></li>
				  @endforeach
				</ul>
			  </li>
			  @endforeach
		  @endif
        </ul>
        <a href="{{ route('person.browse',$person) }}" class="return-btn">{{ getLang() == 'en' ? 'Back' : 'Kembali ke depan' }}</a>
      </div>
    </div>
  </div>
@stop