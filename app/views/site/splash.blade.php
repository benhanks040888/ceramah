@extends('layouts.master')

@section('content')
  <div class="container">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <div class="text-center">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus eveniet ut eaque repudiandae ratione doloremque, at! Blanditiis, veritatis, voluptatibus. Mollitia illum repudiandae, a pariatur necessitatibus consequuntur earum totam suscipit qui.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus eveniet ut eaque repudiandae ratione doloremque, at! Blanditiis, veritatis, voluptatibus. Mollitia illum repudiandae, a pariatur necessitatibus consequuntur earum totam suscipit qui.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus eveniet ut eaque repudiandae ratione doloremque, at! Blanditiis, veritatis, voluptatibus. Mollitia illum repudiandae, a pariatur necessitatibus consequuntur earum totam suscipit qui.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus eveniet ut eaque repudiandae ratione doloremque, at! Blanditiis, veritatis, voluptatibus. Mollitia illum repudiandae, a pariatur necessitatibus consequuntur earum totam suscipit qui.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus eveniet ut eaque repudiandae ratione doloremque, at! Blanditiis, veritatis, voluptatibus. Mollitia illum repudiandae, a pariatur necessitatibus consequuntur earum totam suscipit qui.</p>
          </div>
        </div>
        <div class="item">
          <div class="row">
            <div class="col-sm-4">
              <img src="http://placehold.it/360x270" class="img-responsive">
            </div>

            <div class="col-sm-8">
              <h2>Tentang Bapak Muhammad Subuh Sumohadiwidjojo</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga facere impedit quas ducimus accusamus perferendis, dolores autem tempora voluptate accusantium, consectetur ullam quos at. Quidem sequi ipsam nulla iusto, unde?</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga facere impedit quas ducimus accusamus perferendis, dolores autem tempora voluptate accusantium, consectetur ullam quos at. Quidem sequi ipsam nulla iusto, unde?</p>

              <a href="#" class="btn btn-primary">Tentang Bapak</a>
              <a href="#" class="btn btn-primary">Photo Gallery</a>
              <a href="{{ URL::route('disclaimer') }}" class="btn btn-primary">Go To Surat & Ceramah</a>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="row">
            <div class="col-sm-4">
              <img src="http://placehold.it/360x270" class="img-responsive">
            </div>

            <div class="col-sm-8">
              <h2>Photo Gallery Bapak Muhammad Subuh Sumohadiwidjojo</h2>

              <a href="#" class="btn btn-primary">Tentang Bapak</a>
              <a href="#" class="btn btn-primary">Photo Gallery</a>
              <a href="{{ URL::route('disclaimer') }}" class="btn btn-primary">Go To Surat & Ceramah</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="fa fa-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="fa fa-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
@stop