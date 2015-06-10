@extends('layouts.master')

@section('content')
  <div class="container main-container">
    <div class="row row-no-padding content-content">
      <div class="col-xs-8 content-left-container">
        <div class="primary-image-container">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio officiis nobis consequatur dolor debitis, provident molestiae voluptatem suscipit quas alias nulla reprehenderit error possimus cum adipisci, obcaecati doloribus quidem voluptate!</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio officiis nobis consequatur dolor debitis, provident molestiae voluptatem suscipit quas alias nulla reprehenderit error possimus cum adipisci, obcaecati doloribus quidem voluptate!</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio officiis nobis consequatur dolor debitis, provident molestiae voluptatem suscipit quas alias nulla reprehenderit error possimus cum adipisci, obcaecati doloribus quidem voluptate!</p>
          <a href="#" data-toggle="modal" data-target="#modal">View Full Screen</a>
        </div>
      </div>
      <div class="col-xs-4 content-right-container">
        @include('_partials.content-menu')

        <ul class="topic-list">
          <li class="topic-item">
            <h3>Aim</h3>
            <ul class="title-list">
              <li><a href="#">Aim, Khusus <span>RAH023ENG</span></a></li>
            </ul>
          </li>
        </ul>
        <a href="{{ URL::previous() }}" class="return-btn">Kembali Ke Depan</a>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio officiis nobis consequatur dolor debitis, provident molestiae voluptatem suscipit quas alias nulla reprehenderit error possimus cum adipisci, obcaecati doloribus quidem voluptate!</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio officiis nobis consequatur dolor debitis, provident molestiae voluptatem suscipit quas alias nulla reprehenderit error possimus cum adipisci, obcaecati doloribus quidem voluptate!</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio officiis nobis consequatur dolor debitis, provident molestiae voluptatem suscipit quas alias nulla reprehenderit error possimus cum adipisci, obcaecati doloribus quidem voluptate!</p>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
@stop