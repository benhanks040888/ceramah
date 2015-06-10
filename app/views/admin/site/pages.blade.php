@extends('admin.layouts.master')

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Pages </h1>
    </div>
  </div>
  <hr/>
	
	<div class="table-responsive">
		<table class="table table-hover datatable">
			<thead>
				<tr>
					<th>Section</th>
				</tr>
			</thead>
			<tbody>
				@foreach($section as $slug => $string)
				<tr><td><a href="{{URL::route('admin.pages.edit',$slug)}}">{{$string}}</a></td></tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop
	
@section('scripts')
@stop