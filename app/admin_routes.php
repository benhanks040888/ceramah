<?php

/*
 * 
 * Admin Route
 */
Route::group(array('prefix' => 'admin-cms', 'namespace' => 'App\Controllers\Admin'), function() {
  Route::get('/', array('as' => 'admin.login', 'uses' => 'AuthController@getIndex'));
  Route::get('logout', array('as' => 'admin.logout', 'uses' => 'AuthController@getLogout'));

  Route::post('/', array('as' => 'admin.login.submit', 'uses' => 'AuthController@postLogin'));

  // These routes is only accessible when admin is already logged in
  Route::group(array('before' => 'admin'), function() {
    Route::get('dashboard', array('as' => 'admin.dashboard', 'uses' => 'SiteController@getIndex'));

    Route::get('change-password', array('as' => 'admin.change-password', 'uses' => 'AuthController@getChangePassword'));
    Route::post('change-password', array('as' => 'admin.change-password.submit', 'uses' => 'AuthController@postChangePassword'));
   
    Route::get('pages', array('as' => 'admin.pages', 'uses' => 'PagesController@getList'));
    Route::get('pages/list', array('as' => 'admin.pages.list', 'uses' => 'PagesController@postList'));
	Route::get('pages/edit/{id}', array('as' => 'admin.pages.edit', 'uses' => 'PagesController@getFormEdit'));
	Route::post('pages/submit', array('as' => 'admin.pages.submit', 'uses' => 'PagesController@postSubmit'));
	
    Route::get('gallery', array('as' => 'admin.gallery', 'uses' => 'GalleryController@getList'));
    Route::get('gallery/list', array('as' => 'admin.gallery.list', 'uses' => 'GalleryController@postList'));
	Route::get('gallery/add', array('as' => 'admin.gallery.add', 'uses' => 'GalleryController@getFormAdd'));
    Route::get('gallery/edit/{id}', array('as' => 'admin.gallery.edit', 'uses' => 'GalleryController@getFormEdit'));
	Route::post('gallery/detail', array('as' => 'admin.gallery.detail', 'uses' => 'GalleryController@postDetail'));
	Route::post('gallery/submit', array('as' => 'admin.gallery.submit', 'uses' => 'GalleryController@postSubmit'));
	Route::post('gallery/delete', array('as' => 'admin.gallery.delete', 'uses' => 'GalleryController@postDelete'));
	
	Route::get('music', array('as' => 'admin.music', 'uses' => 'MusicController@getList'));
    Route::post('music/submit', array('as' => 'admin.music.submit', 'uses' => 'MusicController@postSubmit'));
	
	Route::get('posts/list', array('as' => 'admin.posts.list', 'uses' => 'PostsController@postList'));
	Route::get('posts/edit/{id}', array('as' => 'admin.posts.edit', 'uses' => 'PostsController@getFormEdit'));
	Route::get('posts/{type}/{person}', array('as' => 'admin.posts', 'uses' => 'PostsController@getList'));
	Route::get('posts/add/{type}/{person}', array('as' => 'admin.posts.add', 'uses' => 'PostsController@getFormAdd'));
    Route::post('posts/detail', array('as' => 'admin.posts.detail', 'uses' => 'PostsController@postDetail'));
	Route::post('posts/submit/{type}/{person}', array('as' => 'admin.posts.submit', 'uses' => 'PostsController@postSubmit'));
	Route::post('posts/delete', array('as' => 'admin.posts.delete', 'uses' => 'PostsController@postDelete'));
  
    Route::get('category', array('as' => 'admin.category', 'uses' => 'CategoryController@getList'));
    Route::get('category/list', array('as' => 'admin.category.list', 'uses' => 'CategoryController@postList'));
	Route::get('category/add', array('as' => 'admin.category.add', 'uses' => 'CategoryController@getFormAdd'));
    Route::get('category/edit/{id}', array('as' => 'admin.category.edit', 'uses' => 'CategoryController@getFormEdit'));
	Route::post('category/detail', array('as' => 'admin.category.detail', 'uses' => 'CategoryController@postDetail'));
	Route::post('category/submit', array('as' => 'admin.category.submit', 'uses' => 'CategoryController@postSubmit'));
	Route::post('category/delete', array('as' => 'admin.category.delete', 'uses' => 'CategoryController@postDelete'));
  });
});