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

        <ul class="topic-list custom-scrollbar">
		      @foreach($posts as $init=>$postx)
            <li class="topic-item">
              <h3>{{$init}}</h3>
              <ul class="title-list">
        				@foreach($postx as $post)
          				<li class="title"><a href="{{ route('content.topic', Str::slug($post->title)) }}">{{$post->title}}</a></li>
                @endforeach
              </ul>
            </li>
      		@endforeach
        </ul>
        <a href="{{ URL::previous() }}" class="return-btn">Kembali Ke Depan</a>
      </div>
    </div>
  </div>
@stop