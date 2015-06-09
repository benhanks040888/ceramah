<?php namespace App\Controllers;

use BaseController;
use View;

class MainController extends BaseController {

  public function getIndex()
  {
    return View::make('main.index');
  }

  public function getPerson($person)
  {
    return View::make('main.browse', compact('person'));
  }
}