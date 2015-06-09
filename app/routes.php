<?php

/*
 * 
 * Admin Route
 */
Route::group(array('prefix' => 'admin', 'namespace' => 'App\Controllers\Admin'), function() {
  Route::get('/', array('as' => 'admin.login', 'uses' => 'AuthController@getIndex'));
  Route::get('logout', array('as' => 'admin.logout', 'uses' => 'AuthController@getLogout'));

  Route::post('/', array('as' => 'admin.login.submit', 'uses' => 'AuthController@postLogin'));

  // These routes is only accessible when admin is already logged in
  Route::group(array('before' => 'admin'), function() {
    Route::get('dashboard', array('as' => 'admin.dashboard', 'uses' => 'SiteController@getIndex'));

    Route::get('change-password', array('as' => 'admin.change-password', 'uses' => 'AuthController@getChangePassword'));
    Route::post('change-password', array('as' => 'admin.change-password.submit', 'uses' => 'AuthController@postChangePassword'));
  });
});

Route::group(array('namespace' => 'App\Controllers'), function() {
  Route::get('/', array('as' => 'home', 'uses' => 'HomeController@getIndex'));

  Route::get('splash', array('as' => 'splash', 'uses' => 'HomeController@getSplash'));
  Route::get('disclaimer', array('as' => 'disclaimer', 'uses' => 'HomeController@getDisclaimer'));

  Route::get('main', array('as' => 'main', 'uses' => 'MainController@getIndex'));

  Route::get('content', array('as' => 'content.list', 'uses' => 'ContentController@getIndex'));
  Route::get('content/{topic}', array('as' => 'content.topic', 'uses' => 'ContentController@getTopic'));
  Route::get('content/{topic}/{code}', array('as' => 'content.detail', 'uses' => 'ContentController@getDetail'));

  Route::get('{name}', array('as' => 'person.browse', 'uses' => 'MainController@getPerson'));
  Route::get('{name}/{type}', array('as' => 'person.topic.list', 'uses' => 'ContentController@getPersonTopic'));

});
