<?php namespace App\Controllers\Admin;

use BaseController;
use DB, View, Datatables, Input, Redirect, Str, Validator, Image, Cache, File;
use App\Models\Pages;

class PagesController extends BaseController {

	public function getList()
	{
		$section = Pages::getSections();
		$data['section'] = $section;
		return View::make('admin.site.pages',$data);
	}
	
	public function getFormEdit($id)
	{
		$sectionName = Pages::getSectionBySlug($id);
		
		if($sectionName === false)
			return Redirect::route('admin.pages');
			
		$data = array();
		$input = Pages::Section($sectionName)->first();
		if(is_null($input))
			return Redirect::route('admin.pages');
		
		$data['input'] = Input::old();
		if(!$data['input']){
			$data['input'] = $input;
		}
		$data['formProcess'] = "editProcess";
		
		$data['title'] = $sectionName;
		return View::make('admin.site.form.pages',$data);
	}
	
	public function postSubmit(){
		if(Input::get('_action') == 'addProcess'){
			//disabled by default
		}
		elseif(Input::get('_action') == 'editProcess'){
			if(Input::has('id')){
				$pages = Pages::find(Input::get('id'));
				$pages->content_en = Input::get('content_en');
				$pages->content_id = Input::get('content_id');
				$pages->save();
			}
		}
		return Redirect::route('admin.pages');
	}
}