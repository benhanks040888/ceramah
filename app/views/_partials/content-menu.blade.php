<nav id="navbar">
  {{ Form::open(array('route' => 'content.search', 'method' => 'POST')) }}
    <input type="text" name="term" id="input-search" placeholder="Search">
  {{ Form::close() }} 
  <a href="{{ route('main') }}" class="menu-link">Menu</a>
  <a href="{{ route('home') }}" class="home-link">Home</a>
</nav>