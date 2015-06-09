<div class="filters">
  {{ Form::open(array('method' => 'GET')) }}
    <i class="fa fa-search"></i>
    <input type="text" name="q" placeholder="Search">
    <a href="{{ route('main') }}"><i class="fa fa-bars"></i> Menu</a>
    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
  {{ Form::close() }}
</div>