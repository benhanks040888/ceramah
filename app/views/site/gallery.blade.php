@extends('layouts.master')

@section('content')
  <div class="container main-container">
    <div class="row content-gallery">
      <figure class="col-xs-5 col-no-padding featured-image">
        <img src="{{ assets_url('images/m-subuh.jpg') }}" alt="Muhammad Subuh Sumohadiwidjojo">
      </figure>
      <div class="col-xs-7 intro-right-container">
        <header><h1><span>Photo Gallery</span><br>Bapak Muhammad Subuh Sumohadiwidjojo</h1></header>
        <div class="gallery-grid-container custom-scrollbar">
          <div class="gallery-grid">
			@foreach($content as $picture)
            <div class="grid-item">
              <img src="{{ URL::asset($picture->thumbnail) }}" class="modal-thumbnail" alt="{{$picture->name}}" data-toggle="modal" data-target="#gallery-item-{{$picture->id}}">
              <div class="modal gallery-modal fade" id="gallery-item-{{$picture->id}}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                    <img src="{{ URL::asset($picture->image) }}" alt="{{$picture->name}}" class="modal-image">
                  </div>
                </div>
              </div>
            </div>
			@endforeach
          </div>
        </div>
        <nav class="bottom-navigation">
          <ul>
            <li><a href="{{ route('about') }}"><span class="label label-default">Tentang Bapak</span></a></li>
            <li><a href="{{ route('gallery') }}"><span class="label label-default">Photo Gallery</span></a></li>
            <li><a href="{{ route('disclaimer') }}"><span class="label label-default">Go To Surat dan Ceramah</span></a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
@stop