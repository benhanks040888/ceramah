<?php namespace App\Controllers;

use BaseController;
use View;

class HomeController extends BaseController {

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
    return View::make('site.splash');
  }

  public function getAbout()
  {
    return View::make('site.about');
  }

  public function getGallery()
  {
    return View::make('site.gallery');
  }

  public function getDisclaimer()
  {
    return View::make('site.disclaimer');
  }

}