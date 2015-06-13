<?php namespace App\Controllers;

use BaseController;
use View,Input,Cookie,Response;
use App\Models\Pages;
use App\Models\Music;
use App\Models\Gallery;

class HomeController extends BaseController {

	private $lang = 'id';
	
	public function __construct()
	{
		if(Cookie::get('subud_lang') === 'en'){
			$this->lang = Cookie::get('subud_lang');
		}
	}
	 
	public function showWelcome()
	{
		return View::make('hello');
	}

  public function getIndex()
  {
	return View::make('site.choose-language');
  }

  public function getSplash()
  {
	$content = Pages::Section('Kata Pembuka')->first();
	$data['content'] = "Data not found";
	if($content){
		$data['content'] = $content->content_id;
		if($this->lang === 'en')
			$data['content'] = $content->content_en;
	}
	
	$music = Music::first();
	$data['music'] = '';
	if($music){
		$data['music'] = $music->file_name;
	}
	
    return View::make('site.splash',$data);
  }

  public function getAbout()
  {
    $content = Pages::Section('Tentang Bapak')->first();
	$data['content'] = "Data not found";
	if($content){
		$data['content'] = $content->content_id;
		if($this->lang === 'en')
			$data['content'] = $content->content_en;
	}
	
    return View::make('site.about',$data);
  }

  public function getGallery()
  {
    $content = Gallery::get();
	$data['content'] = $content;
    return View::make('site.gallery',$data);
  }

  public function getDisclaimer()
  {
    $content = Pages::Section('Sangkalan')->first();
	$data['content'] = "Data not found";
	if($content){
		$data['content'] = $content->content_id;
		if($this->lang === 'en')
			$data['content'] = $content->content_en;
	}
    return View::make('site.disclaimer',$data);
  }

  public function postChangeLanguage()
  {
	$lang = Input::get('lang');
	if($lang === 'en' || $lang === 'id')
		Cookie::queue('subud_lang',$lang);
	Response::make();
	echo 1;
  }
}