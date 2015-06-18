 @extends('admin.layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header">Category - {{$action}}</h2>
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
	
	{{ Form::open(array('route' => 'admin.category.submit','class' => 'form-horizontal','files' => true)) }}
	<input type="hidden" name="_action" id="_action" value="{{$formProcess or 'addProcess'}}"/>
	<input type="hidden" name="id" value="{{$input['id'] or 'addProcess'}}"/>
	<div class="form-group">
		<label for="inputTitle" class="col-sm-2 control-label">Category (ID)</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputTitle" name="category_id" placeholder="Category (ID)" value="{{$input['category_id'] or ''}}">
		</div>
	</div>
	<div class="form-group">
		<label for="inputTitle" class="col-sm-2 control-label">Category (EN)</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputTitle" name="category_en" placeholder="Category (EN)" value="{{$input['category_en'] or ''}}">
		</div>
	</div>
	<div class="form-group">
		<label for="inputType" class="col-sm-2 control-label">Belongs To</label>
		<div class="col-sm-10">
			{{ Form::select('belongs_to', $owners, $input['belongs_to'], array('class' => 'form-control')) }}
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-2">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
		<div class="col-sm-6">
			<a href="{{URL::route('admin.category')}}"><button type="button" class="btn btn-default">Back</button></a>
		</div>
	</div>
	{{Form::close()}}
@stop

@section('scripts')
    
@stop