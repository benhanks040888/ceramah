<?php namespace App\Controllers\Admin;

use BaseController;

use DB, View;
use App\Models\Posts;

class SiteController extends BaseController {

  public function getIndex()
  {
	$data['surat_bapak'] = Posts::Person('bapak')->Type('surat')->count();
	$data['surat_ibu'] = Posts::Person('ibu')->Type('surat')->count();
	$data['ceramah_bapak'] = Posts::Person('bapak')->Type('ceramah')->count();
	$data['ceramah_ibu'] = Posts::Person('ibu')->Type('ceramah')->count();
    return View::make('admin.site.index',$data);
  }

}