<?php namespace App\Controllers;

use BaseController;
use View,Input,Cookie,Response;

class MainController extends BaseController {

	private $lang = 'id';
	
	public function __construct()
	{
		if(Cookie::get('subud_lang') === 'en'){
			$this->lang = Cookie::get('subud_lang');
		}
	}
	 
  public function getIndex()
  {
    return View::make('main.index');
  }

  public function getPerson($person)
  {
    return View::make('main.browse', compact('person'));
  }
}