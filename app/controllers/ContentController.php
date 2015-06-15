<?php namespace App\Controllers;

use BaseController;
use View,Redirect,Input;
use App\Models\Posts;

class ContentController extends BaseController {

  public function getIndex()
  {
  	$posts = array();
  	if(getLang() == 'en'){
  		$init = Posts::getInitialsEn();
  		foreach($init as $first){
  		  if(!empty($first->init))
  			$posts[$first->init] = Posts::getTitleByInitialsEn($first->init);
  		}
  	}
  	else{
  		$init = Posts::getInitials();
  		foreach($init as $first){
  			if(!empty($first->init))
  				$posts[$first->init] = Posts::getTitleByInitials($first->init);
  		}
  	}
  	$data['posts'] = $posts;
    return View::make('content.index',$data);
  }

  public function getTopic($topic)
  {
  	if(getLang() == 'en'){
  		$post = Posts::where('title_en','like',$topic)->get();
  		if($post->isEmpty()){
  			$post = Posts::where('title','like',$topic)->first();
  			if($post){ //topic wrong language
  				return Redirect::route('content.topic',array('topic'=>$post->title_en));
  			}
  			return Redirect::route('content.list');
  		}
  	}
  	else{
  		$post = Posts::where('title','like',$topic)->get();
  		if($post->isEmpty()){
  			$post = Posts::where('title_en','like',$topic)->first();
  			if($post){ //topic wrong language
  				return Redirect::route('content.topic',array('topic'=>$post->title));
  			}
  			return Redirect::route('content.list');
  		}
  	}
   
    $data['title'] = $topic;
    $data['posts'] = $post;
  
    return View::make('content.topic', $data);
  }

  public function getPerson($person)
  {
    $post_person = ($person === 'ibu-rahayu')?'ibu':'bapak';
    return View::make('content.person', compact('person','post_person'));
  }
   
  public function getPersonTopic($person, $type)
  {
  	$post_person = ($person === 'ibu-rahayu')?'ibu':'bapak';
  	$posts = array();
  	if(getLang() == 'en'){
  		$titles = Posts::getTitleByPersonAndTypeEn($post_person,$type);
  		foreach($titles as $title){
  			if(!empty($title->title))
  				$posts[$title->title] = Posts::getPostsByPersonAndTypeAndTitleEn($post_person,$type,$title->title);
  		}
  	}
  	else{
  		$titles = Posts::getTitleByPersonAndType($post_person,$type);
  		foreach($titles as $title){
  			if(!empty($title->title))
  				$posts[$title->title] = Posts::getPostsByPersonAndTypeAndTitle($post_person,$type,$title->title);
  		}
  	}
    return View::make('content.person-topic', compact('person', 'post_person', 'posts', 'type'));
  }

  public function getPersonTopicByInitial($person, $type, $init)
  {
    $post_person = ($person === 'ibu-rahayu')?'ibu':'bapak';
  	$posts = array();
  	if(getLang() == 'en'){
  		$titles = Posts::getTitleByPersonAndTypeAndInitialEn($post_person,$type,$init);		
  		foreach($titles as $title){
  			if(!empty($title->title))
  				$posts[$title->title] = Posts::getPostsByPersonAndTypeAndTitleEn($post_person,$type,$title->title);
  		}
  	}
  	else{
  		$titles = Posts::getTitleByPersonAndTypeAndInitial($post_person,$type,$init);		
  		foreach($titles as $title){
  			if(!empty($title->title))
  				$posts[$title->title] = Posts::getPostsByPersonAndTypeAndTitle($post_person,$type,$title->title);
  		}
  	}
  	return View::make('content.person-topic', compact('posts', 'person', 'post_person', 'type'));
  }
  
  public function postSearch()
  {
  	$term = Input::get('term');
  	$posts = array();
  	
  	if(getLang() == 'en'){
  		$results = Posts::searchByTitleOrCodeEn($term);
  		foreach($results as $result){
  			if(!isset($posts[$result->title_en]))
  				$posts[$result->title_en] = array();
  			array_push($posts[$result->title_en],$result);
  		}
  	}
  	else{
  		$results = Posts::searchByTitleOrCode($term);
  		foreach($results as $result){
  			if(!isset($posts[$result->title]))
  				$posts[$result->title] = array();
  			array_push($posts[$result->title],$result);
  		}
  	}
  	return View::make('content.search-result', compact('posts'));
  }
  
  public function getDetail($topic,$code)
  {
	if(getLang() == 'en'){
		$post = Posts::where('title_en','like',$topic)->first();
		if(!$post){
			$post = Posts::where('title','like',$topic)->first();
			if($post){ //topic wrong language
				return Redirect::route('content.detail',array('topic'=>$post->title_en, 'code'=>$code));
			}
			return Redirect::route('content.list');
		}
		
		$post = Posts::where('title_en','like',$topic)->where('code_en','like',$code)->first();
		if(!$post){
		  $post = Posts::where('title_en','like',$topic)->where('code','like',$code)->first();
		  if($post){ //code wrong language
			return Redirect::route('content.detail',array('topic'=>$post->title_en, 'code'=>$post->code_en));
		  }
		  return Redirect::route('content.topic',array($topic));
		}
	}
	else{
		$post = Posts::where('title','like',$topic)->first();
		if(!$post){
			$post = Posts::where('title_en','like',$topic)->first();
			if($post){ //topic wrong language
				return Redirect::route('content.detail',array('topic'=>$post->title, 'code'=>$code));
			}
			return Redirect::route('content.list');
		}
		
		$post = Posts::where('title','like',$topic)->where('code','like',$code)->first();
		if(!$post){
		  $post = Posts::where('title','like',$topic)->where('code_en','like',$code)->first();
		  if($post){ //code wrong language
			return Redirect::route('content.detail',array('topic'=>$post->title, 'code'=>$post->code));
		  }
		  return Redirect::route('content.topic',array($topic));
		}
	}
    $data['title'] = $topic;
    $data['post'] = $post;
    return View::make('content.detail',$data);
  }
}