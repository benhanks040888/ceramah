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
		<label for="title" class="col-sm-2 control-label">Title</label>
		<div class="col-sm-10">
			{{ Form::select('category_id', $category, $input['category_id'], array('class' => 'form-control')) }}
		</div>
	</div>
	<div class="form-group">
		<label for="code" class="col-sm-2 control-label">Code (ID)</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputCode" name="code" placeholder="Code (ID)" value="{{$input['code'] or ''}}">
		</div>
	</div>
	<div class="form-group">
		<label for="subtitle" class="col-sm-2 control-label">Subtitle (ID)</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputSubtitle" name="subtitle" placeholder="Subtitle" value="{{$input['subtitle'] or ''}}">
		</div>
	</div>
	<div class="form-group">
		<label for="tag" class="col-sm-2 control-label">Tag (ID)</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputTag" name="tag" placeholder="Tag (ID)" value="{{$input['tag'] or ''}}">
		</div>
	</div>
	<div class="form-group">
		<label for="content_id" class="col-sm-2 control-label">Content (ID)</label>
		<div class="col-sm-10">
			<textarea type="text" class="form-control" id="content_id" name="content_id" placeholder="Konten Bahasa Indonesia">{{$input['content_id'] or ''}}</textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="code" class="col-sm-2 control-label">Code (EN)</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputCode" name="code_en" placeholder="Code (EN)" value="{{$input['code_en'] or ''}}">
		</div>
	</div>
	<div class="form-group">
		<label for="subtitle" class="col-sm-2 control-label">Subtitle (EN)</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputSubtitle" name="subtitle_en" placeholder="Subtitle (EN)" value="{{$input['subtitle_en'] or ''}}">
		</div>
	</div>
	<div class="form-group">
		<label for="tag" class="col-sm-2 control-label">Tag (EN)</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputTag" name="tag_en" placeholder="Tag (EN)" value="{{$input['tag_en'] or ''}}">
		</div>
	</div>
	<div class="form-group">
		<label for="content_en" class="col-sm-2 control-label">Content (EN)</label>
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