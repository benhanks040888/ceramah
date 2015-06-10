@extends('admin.layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header">{{$title}}</h2>
		</div>
	</div>
	@if($errors->first())
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3 bg-danger text-center text-danger">
			<strong class="">{{$errors->first()}}</strong>
		</div>
	</div>
	<hr/>
	@endif
	
	{{ Form::open(array('route' => 'admin.posts.submit','class' => 'form-horizontal')) }}
	<input type="hidden" name="_action" id="_action" value="{{$formProcess or 'addProcess'}}"/>
	<input type="hidden" name="id" value="{{$input['id'] or ''}}"/>
	<input type="hidden" name="person" value="{{$input['person'] or $parameter['person']}}"/>
	<input type="hidden" name="type" value="{{$input['type'] or $parameter['type']}}"/>
	<div class="form-group">
		<label for="code" class="col-sm-2 control-label">Code</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputCode" name="code" placeholder="Code" value="{{$input['code'] or ''}}">
		</div>
	</div>
	<div class="form-group">
		<label for="title" class="col-sm-2 control-label">Title</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputTitle" name="title" placeholder="Title" value="{{$input['title'] or ''}}">
		</div>
	</div>
	<div class="form-group">
		<label for="tag" class="col-sm-2 control-label">Tag</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputTag" name="tag" placeholder="Tag" value="{{$input['tag'] or ''}}">
		</div>
	</div>
	<div class="form-group">
		<label for="content_id" class="col-sm-2 control-label">Bahasa Indonesia</label>
		<div class="col-sm-10">
			<textarea type="text" class="form-control" id="content_id" name="content_id" placeholder="Konten Bahasa Indonesia">{{$input['content_id'] or ''}}</textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="content_en" class="col-sm-2 control-label">English</label>
		<div class="col-sm-10">
			<textarea type="text" class="form-control" id="content_en" name="content_en" placeholder="English Content">{{$input['content_en'] or ''}}</textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-2">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
		<div class="col-sm-6">
			<a href="{{URL::route('admin.posts',array('type'=>$parameter['type'],'person'=>$parameter['person']))}}"><button type="button" class="btn btn-default">Back</button></a>
		</div>
	</div>
	{{Form::close()}}
@stop

@section('scripts')
    <script src="{{ assets_url('admin/js/vendors/tinymce/tinymce.min.js') }}"></script>
	<script type="text/javascript">
	tinyMCE.init({
			theme : "modern",
			mode : "textareas"
	});
	</script>
@stop