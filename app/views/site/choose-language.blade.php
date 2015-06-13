@extends('layouts.simple')

@section('content')
  <div class="container header-container">
  </div>
  <div class="container main-container">
    <div class="content-home text-center">
      <div class="logo-container">
        <img src="{{ assets_url('images/logo.png') }}" alt="Logo">
      </div>
      <h1>Surat dan ceramah-ceramah pilihan <hr> SELECTED LETTERS AND TALKS</h1>
      <div class="language-container">
        <a href="javascript:void(0)" onclick="changeLanguage('en')" class="btn btn-subud btn-default">English</a>
        <a href="javascript:void(0)" onclick="changeLanguage('id')" class="btn btn-subud btn-default">Bahasa Indonesia</a>
      </div>
    </div>
  </div>
@stop

@section('scripts')
<script>
	function changeLanguage(lang){
		$.ajaxSetup({
		   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});
		$.ajax({
			url: "{{URL::route('language')}}",  //Server script to process data
			type: 'POST',
			dataType: 'json',
			data: "lang="+lang,
			cache: false,
			success: function(data){
				window.location.href = "{{ URL::route('splash') }}";
			}
		});
	}
</script>
@stop