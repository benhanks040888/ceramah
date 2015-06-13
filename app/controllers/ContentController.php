<?php namespace App\Controllers;

use BaseController;
use View,Redirect;
use App\Models\Posts;

class ContentController extends BaseController {

  public function getIndex()
  {
    $init = Posts::getInitials();
	$posts = array();
	foreach($init as $first){
		$posts[$first->init] = Posts::getTitleByInitials($first->init);
	}
	$data['posts'] = $posts;
    return View::make('content.index',$data);
  }

  public function getTopic($topic)
  {
    $post = Posts::where('title','like',$topic)->get();
	if($post->isEmpty())
		return Redirect::route('content.list');
	$data['title'] = $topic;
	$data['posts'] = $post;
	
	return View::make('content.topic', $data);
  }

  public function getPersonTopic($person, $type)
  {
    return View::make('content.person-topic', compact('person', 'type'));
  }

  public function getDetail($topic,$code)
  {
	$post = Posts::where('title','like',$topic)->get();
	if($post->isEmpty())
		return Redirect::route('content.list');
	$post = Posts::where('code','like',$code)->first();
	if(!$post)
		return Redirect::route('content.topic',array($topic));
	$data['title'] = $topic;
	$data['post'] = $post;
    return View::make('content.detail',$data);
  }

}