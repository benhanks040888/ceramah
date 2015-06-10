<?php

include('admin_routes.php');

Route::group(array('namespace' => 'App\Controllers'), function() {
  Route::get('/', array('as' => 'home', 'uses' => 'HomeController@getIndex'));

  Route::get('splash', array('as' => 'splash', 'uses' => 'HomeController@getSplash'));
  Route::get('about', array('as' => 'about', 'uses' => 'HomeController@getAbout'));
  Route::get('gallery', array('as' => 'gallery', 'uses' => 'HomeController@getGallery'));
  Route::get('disclaimer', array('as' => 'disclaimer', 'uses' => 'HomeController@getDisclaimer'));

  Route::get('main', array('as' => 'main', 'uses' => 'MainController@getIndex'));

  Route::get('content', array('as' => 'content.list', 'uses' => 'ContentController@getIndex'));
  Route::get('content/{topic}', array('as' => 'content.topic', 'uses' => 'ContentController@getTopic'));
  Route::get('content/{topic}/{code}', array('as' => 'content.detail', 'uses' => 'ContentController@getDetail'));

  Route::get('{name}', array('as' => 'person.browse', 'uses' => 'MainController@getPerson'));
  Route::get('{name}/{type}', array('as' => 'person.topic.list', 'uses' => 'ContentController@getPersonTopic'));

});