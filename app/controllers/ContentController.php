<?php namespace App\Controllers;

use BaseController;
use View;

class ContentController extends BaseController {

  public function getIndex()
  {
    return View::make('content.index');
  }

  public function getTopic($topic)
  {
    return View::make('content.topic', compact('topic'));
  }

  public function getPersonTopic($person, $type)
  {
    return View::make('content.person-topic', compact('person', 'type'));
  }

  public function getDetail($code)
  {
    return View::make('content.detail');
  }

}