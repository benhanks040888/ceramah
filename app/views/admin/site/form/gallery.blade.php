 @extends('admin.layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header">Gallery - {{$action}}</h2>
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
	
	{{ Form::open(array('route' => 'admin.gallery.submit','class' => 'form-horizontal','files' => true)) }}
	<input type="hidden" name="_action" id="_action" value="{{$formProcess or 'addProcess'}}"/>
	<input type="hidden" name="id" value="{{$input['id'] or 'addProcess'}}"/>
	<div class="form-group">
		<label for="inputTitle" class="col-sm-2 control-label">Photo Title</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputTitle" name="title" placeholder="Photo Title" value="{{$input['title'] or ''}}">
		</div>
	</div>
	<div class="form-group">
		<label for="inputImage" class="col-sm-2 control-label">Image File</label>
		<div class="col-sm-10">
			@if(!empty($input['image']))
				<img width="200" src="{{asset($input['image'])}}"/>
			@endif
			<input type="file" name="image" id="inputImage">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-2">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
		<div class="col-sm-6">
			<a href="{{URL::route('admin.gallery')}}"><button type="button" class="btn btn-default">Back</button></a>
		</div>
	</div>
	{{Form::close()}}
@stop

@section('scripts')
    
@stop