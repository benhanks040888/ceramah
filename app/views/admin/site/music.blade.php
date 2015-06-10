@extends('admin.layouts.master')

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Music</h1>
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
	
	{{ Form::open(array('route' => 'admin.music.submit','class' => 'form-horizontal','files' => true)) }}
	<input type="hidden" name="_action" id="_action" value="{{$formProcess or 'addProcess'}}"/>
	<input type="hidden" name="id" value="{{$input['id'] or ''}}"/>
	<div class="form-group">
		<label for="inputTitle" class="col-sm-2 control-label">Music Title</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputTitle" name="title" placeholder="Music Title" value="{{$input['title'] or ''}}">
		</div>
	</div>
	<div class="form-group">
		<label for="inputAudio" class="col-sm-2 control-label">MP3 File</label>
		<div class="col-sm-10">
			@if(!empty($input['file_name']))
				 <audio controls>
				  <source src="{{asset($input['file_name'])}}" type="audio/mpeg">
				  Your browser does not support the audio tag.
				</audio> 
			@endif
			<input type="file" accept=".mp3,audio/*" name="file_name" id="inputAudio">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-2">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</div>
	{{Form::close()}}
@stop
	
@section('scripts')
@stop