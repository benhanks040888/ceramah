@extends('layouts.master')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-7">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio officiis nobis consequatur dolor debitis, provident molestiae voluptatem suscipit quas alias nulla reprehenderit error possimus cum adipisci, obcaecati doloribus quidem voluptate!</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio officiis nobis consequatur dolor debitis, provident molestiae voluptatem suscipit quas alias nulla reprehenderit error possimus cum adipisci, obcaecati doloribus quidem voluptate!</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio officiis nobis consequatur dolor debitis, provident molestiae voluptatem suscipit quas alias nulla reprehenderit error possimus cum adipisci, obcaecati doloribus quidem voluptate!</p>
        <a href="#" data-toggle="modal" data-target="#modal">View Full Screen</a>
      </div>
      <div class="col-sm-5">
        @include('_partials.content-menu')

        <div class="content-list">
          <h3>Marriage</h3>

          <ul class="list-unstyled">
            <li><a href="#">Marriage, Tag <span>RAH023ENG</span></a></li>
          </ul>
        </div>

        <a href="{{ URL::previous() }}">
          <i class="fa fa-chevron-left"></i> KEMBALI KE DEPAN
        </a>
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