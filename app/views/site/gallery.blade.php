@extends('layouts.master')

@section('content')
  <div class="container main-container">
    <div class="row content-gallery">
      <figure class="col-xs-5 col-no-padding featured-image">
        <img src="{{ assets_url('images/m-subuh.jpg') }}" alt="Muhammad Subuh Sumohadiwidjojo">
      </figure>
      <div class="col-xs-7 intro-right-container">
        <header><h1><span>Photo Gallery</span><br>Bapak Muhammad Subuh Sumohadiwidjojo</h1></header>
        <div class="gallery-grid-container">
          <div class="gallery-grid">
            <div class="grid-item">
              <img src="{{ assets_url('images/gallery/beach.jpg') }}" class="modal-thumbnail" alt="beach" data-toggle="modal" data-target="#gallery-item-1">
              <div class="modal gallery-modal fade" id="gallery-item-1" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                    <img src="{{ assets_url('images/gallery/beach.jpg') }}" alt="beach" class="modal-image">
                  </div>
                </div>
              </div>
            </div>

            <div class="grid-item">
              <img src="{{ assets_url('images/gallery/book.jpg') }}" class="modal-thumbnail" alt="book" data-toggle="modal" data-target="#gallery-item-2">
              <div class="modal gallery-modal fade" id="gallery-item-2" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                    <img src="{{ assets_url('images/gallery/book.jpg') }}" alt="book" class="modal-image">
                  </div>
                </div>
              </div>
            </div>

            <div class="grid-item">
              <img src="{{ assets_url('images/gallery/building.jpg') }}" class="modal-thumbnail" alt="building" data-toggle="modal" data-target="#gallery-item-3">
              <div class="modal gallery-modal fade" id="gallery-item-3" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                    <img src="{{ assets_url('images/gallery/building.jpg') }}" alt="building" class="modal-image">
                  </div>
                </div>
              </div>
            </div>

            <div class="grid-item">
              <img src="{{ assets_url('images/gallery/beach.jpg') }}" class="modal-thumbnail" alt="beach" data-toggle="modal" data-target="#gallery-item-4">
              <div class="modal gallery-modal fade" id="gallery-item-4" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                    <img src="{{ assets_url('images/gallery/beach.jpg') }}" alt="beach" class="modal-image">
                  </div>
                </div>
              </div>
            </div>

            <div class="grid-item">
              <img src="{{ assets_url('images/gallery/traffic.jpg') }}" class="modal-thumbnail" alt="traffic" data-toggle="modal" data-target="#gallery-item-5">
              <div class="modal gallery-modal fade" id="gallery-item-5" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                    <img src="{{ assets_url('images/gallery/traffic.jpg') }}" alt="traffic" class="modal-image">
                  </div>
                </div>
              </div>
            </div>

            <div class="grid-item">
              <img src="{{ assets_url('images/gallery/girl.jpg') }}" class="modal-thumbnail" alt="girl" data-toggle="modal" data-target="#gallery-item-6">
              <div class="modal gallery-modal fade" id="gallery-item-6" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                    <img src="{{ assets_url('images/gallery/girl.jpg') }}" alt="girl" class="modal-image">
                  </div>
                </div>
              </div>
            </div>

            <div class="grid-item">
              <img src="{{ assets_url('images/gallery/beach.jpg') }}" class="modal-thumbnail" alt="beach" data-toggle="modal" data-target="#gallery-item-7">
              <div class="modal gallery-modal fade" id="gallery-item-7" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                    <img src="{{ assets_url('images/gallery/beach.jpg') }}" alt="beach" class="modal-image">
                  </div>
                </div>
              </div>
            </div>

            <div class="grid-item">
              <img src="{{ assets_url('images/gallery/book.jpg') }}" class="modal-thumbnail" alt="book" data-toggle="modal" data-target="#gallery-item-8">
              <div class="modal gallery-modal fade" id="gallery-item-8" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                    <img src="{{ assets_url('images/gallery/book.jpg') }}" alt="book" class="modal-image">
                  </div>
                </div>
              </div>
            </div>

            <div class="grid-item">
              <img src="{{ assets_url('images/gallery/building.jpg') }}" class="modal-thumbnail" alt="building" data-toggle="modal" data-target="#gallery-item-9">
              <div class="modal gallery-modal fade" id="gallery-item-9" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                    <img src="{{ assets_url('images/gallery/building.jpg') }}" alt="building" class="modal-image">
                  </div>
                </div>
              </div>
            </div>

            <div class="grid-item">
              <img src="{{ assets_url('images/gallery/beach.jpg') }}" class="modal-thumbnail" alt="beach" data-toggle="modal" data-target="#gallery-item-10">
              <div class="modal gallery-modal fade" id="gallery-item-10" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                    <img src="{{ assets_url('images/gallery/beach.jpg') }}" alt="beach" class="modal-image">
                  </div>
                </div>
              </div>
            </div>

            <div class="grid-item">
              <img src="{{ assets_url('images/gallery/building.jpg') }}" class="modal-thumbnail" alt="building" data-toggle="modal" data-target="#gallery-item-11">
              <div class="modal gallery-modal fade" id="gallery-item-11" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                    <img src="{{ assets_url('images/gallery/building.jpg') }}" alt="building" class="modal-image">
                  </div>
                </div>
              </div>
            </div>

            <div class="grid-item">
              <img src="{{ assets_url('images/gallery/forest.jpg') }}" class="modal-thumbnail" alt="forest" data-toggle="modal" data-target="#gallery-item-12">
              <div class="modal gallery-modal fade" id="gallery-item-12" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                    <img src="{{ assets_url('images/gallery/forest.jpg') }}" alt="forest" class="modal-image">
                  </div>
                </div>
              </div>
            </div>
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

@section('scripts')
  <script src="{{ assets_url('js/vendors/masonry.pkgd.min.js') }}"></script>
  <script>
    $('.gallery-grid').masonry({
      // options
      itemSelector: '.grid-item',
      columnWidth: 130
    });
  </script>
@stop