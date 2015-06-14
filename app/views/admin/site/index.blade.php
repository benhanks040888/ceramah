@extends('admin.layouts.master')

@section('scripts')
@stop

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Dashboard</h1>
    </div>
  </div>
  
  <div class="row">
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-edit fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{$surat_bapak}}</div>
						<div>Surat Bapak</div>
					</div>
				</div>
			</div>
			<a href="{{URL::route('admin.posts',array('type'=>'surat','person'=>'bapak'))}}">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-green">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-edit fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{$ceramah_bapak}}</div>
						<div>Ceramah Bapak</div>
					</div>
				</div>
			</div>
			<a href="{{URL::route('admin.posts',array('type'=>'ceramah','person'=>'bapak'))}}">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-yellow">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-edit fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{$surat_ibu}}</div>
						<div>Surat Ibu</div>
					</div>
				</div>
			</div>
			<a href="{{URL::route('admin.posts',array('type'=>'surat','person'=>'ibu'))}}">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-red">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-edit fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{$ceramah_ibu}}</div>
						<div>Ceramah Ibu</div>
					</div>
				</div>
			</div>
			<a href="{{URL::route('admin.posts',array('type'=>'ceramah','person'=>'ibu'))}}">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
  </div>
@stop