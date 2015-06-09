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

  public function getDisclaimer()
  {
    return View::make('site.disclaimer');
  }

}