@extends('layouts.master')

@section('content')
  <div class="container main-container">
    <div class="row row-no-padding content-content">
      <div class="col-xs-8 content-left-container">
        <div class="topic-item-container">
          <div class="topic-body copy-mono custom-scrollbar">
            <div class="inner">
				@if(Cookie::get('subud_lang') === 'en')
				{{$post->content_en}}
				@else
				{{$post->content_id}}
				@endif
            </div>
          </div>
          <div class="modal-caller-container">
            <img src="{{ assets_url('images/btn-enlarge.png') }}" class="modal-caller" alt="book" data-toggle="modal" data-target="#js-topic-item-1">

            <div class="modal topic-modal fade" id="js-topic-item-1" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                  
                  <div class="topic-body copy-mono">
                   @if(Cookie::get('subud_lang') === 'en')
					{{$post->content_en}}
					@else
					{{$post->content_id}}
					@endif
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>
      <div class="col-xs-4 content-right-container">
        @include('_partials.content-menu')

        <ul class="topic-list topic-list-with-id custom-scrollbar">
          <li class="topic-item">
            <h3>{{$post->title}}</h3>
            <ul class="title-list">
              <li class="title"><a href="javascript:void(0)">{{$post->subtitle}} <span class="item-meta-id">{{$post->code}}</span></a></li>
            </ul>
          </li>
        </ul>
        <a href="@if(URL::previous()===URL::route('content.search')) {{URL::route('main')}} @else {{ URL::previous() }}@endif" class="return-btn">Kembali Ke Depan</a>
      </div>
    </div>
  </div>

@stop