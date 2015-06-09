@extends('layouts.simple')

@section('content')
  <div class="container">
    <div class="text-center">
      <h1>Surat dan Ceramah-Ceramah Pilihan</h1>

      <a href="{{ URL::route('splash') }}" class="btn btn-primary">English</a> <a href="{{ URL::route('splash') }}" class="btn btn-primary">Bahasa Indonesia</a>
    </div>
  </div>
@stop