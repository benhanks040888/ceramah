<div class="navbar-default sidebar" role="navigation">
  <div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
      <li>
        <a href="{{ URL::route('admin.dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
      </li>
	  <li><a href="{{ URL::route('admin.posts',array('type'=>'surat','person'=>'bapak')) }}"><i class="fa fa-envelope fa-fw"></i> Surat Bapak</a></li>
	  <li><a href="{{ URL::route('admin.posts',array('type'=>'ceramah','person'=>'bapak')) }}"><i class="fa fa-file-text fa-fw"></i> Ceramah Bapak</a></li>
	  <li><a href="{{ URL::route('admin.posts',array('type'=>'surat','person'=>'ibu')) }}"><i class="fa fa-envelope-o fa-fw"></i> Surat Ibu</a></li>
	  <li><a href="{{ URL::route('admin.posts',array('type'=>'ceramah','person'=>'ibu')) }}"><i class="fa fa-file-text fa-fw"></i> Ceramah Ibu</a></li>
	  <li><a href="{{ URL::route('admin.gallery') }}"><i class="fa fa-image fa-fw"></i> Gallery</a></li>
	  <li><a href="{{ URL::route('admin.pages') }}"><i class="fa fa-bookmark fa-fw"></i> Pages</a></li>
	  <li><a href="{{ URL::route('admin.music') }}"><i class="fa fa-music fa-fw"></i> Background Music</a></li>
	  <li><a href="{{ URL::route('admin.category') }}"><i class="fa fa-folder-open fa-fw"></i> Category / Title</a></li>
    </ul>
  </div>
</div>