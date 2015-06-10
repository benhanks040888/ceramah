<nav id="navbar">
  {{ Form::open(array('method' => 'GET')) }}
    <input type="text" id="input-search" placeholder="Search">
  {{ Form::close() }}
  <a href="{{ route('main') }}" class="menu-link">Menu</a>
  <a href="{{ route('home') }}" class="home-link">Home</a>
</nav>