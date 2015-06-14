<?php namespace App\Controllers;

use BaseController;
use View,Redirect,Input;
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
    $post_person = ($person === 'ibu-rahayu')?'ibu':'bapak';
	$titles = Posts::getTitleByPersonAndType($post_person,$type);
	$posts = array();
	foreach($titles as $title){
		$posts[$title->title] = Posts::getPostsByPersonAndTypeAndTitle($post_person,$type,$title->title);
	}
	return View::make('content.person-topic', compact('posts','person', 'type'));
  }
  
  public function getPersonTopicByInitial($person, $type, $init)
  {
    $post_person = ($person === 'ibu-rahayu')?'ibu':'bapak';
	$titles = Posts::getTitleByPersonAndTypeAndInitial($post_person,$type,$init);
	$posts = array();
	foreach($titles as $title){
		$posts[$title->title] = Posts::getPostsByPersonAndTypeAndTitle($post_person,$type,$title->title);
	}
	return View::make('content.person-topic', compact('posts','person', 'type'));
  }

  public function postSearch()
  {
	$term = Input::get('term');
	
    $results = Posts::searchByTitleOrCode($term);
	$posts = array();
	foreach($results as $result){
		if(!isset($posts[$result->title]))
			$posts[$result->title] = array();
		array_push($posts[$result->title],$result);
	}
	return View::make('content.search-result', compact('posts'));
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