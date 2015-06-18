<?php namespace App\Controllers\Admin;

use BaseController;
use DB, View, Datatables, Input, Redirect, Str, Validator, Image, File;
use App\Models\Music;

class MusicController extends BaseController {

	private $upload_path = "uploads/music/";
	public function getList()
	{
		$music_count = Music::count();
		$data = array();
		if($music_count > 0){
			$data['formProcess'] = "editProcess";
			$musicRecord = Music::orderBy('id', 'DESC')->first();
			$id = $musicRecord->id;
			$data['input'] = Music::find($id);
		}
		return View::make('admin.site.music',$data);
	}
	
	public function postSubmit(){
		if(Input::get('_action') == 'addProcess'){
			$validator = Validator::make(
				array(
					'Title' => Input::get('title'),
					'MP3 File' => Input::file('file_name')
				),
				array(
					'Title' => 'required',
					'MP3 File' => 'required'
				)
			);
			
			$mime = Input::file('file_name')->getMimeType();
			if ($validator->fails()){
				return Redirect::route('admin.music')->withErrors($validator)->withInput();
			}
			// if($mime !== 'audio/mpeg'){
			// 	$error = "You have to input audio MP3 file";
			// 	return Redirect::route('admin.music')->withErrors($error)->withInput();
			// }
			$music = new Music;
			$music->title = Input::get('title');
			if(!file_exists($this->upload_path)) {
				mkdir($this->upload_path, 0777, true);
			}
			if(!is_null(Input::file('file_name'))){
				$file = Input::file('file_name');
				if($file->isValid()){
					$filename        = "subud_".str_random(10);
					$extension       = $file->getClientOriginalExtension();
					$upload_name     = $filename.".".$extension;
					$upload_success = $file->move($this->upload_path, $upload_name);
					
					if( $upload_success ) {
					  $music->file_name = $this->upload_path.$upload_name;
					} else {
					  $error = "Failed uploading file";
					  return Redirect::route('admin.music')->withErrors($error)->withInput();
					}
					$music->save();
				}
				else {
				  $error = "Invalid file";
				  return Redirect::route('admin.music')->withErrors($error)->withInput();
				}
			}
			else {
				$error = "Null file input";
				return Redirect::route('admin.music')->withErrors($error)->withInput();
			}
		}
		elseif(Input::get('_action') == 'editProcess'){
			if(Input::has('id')){
				$validator = Validator::make(
					array(
						'Title' => Input::get('title')
					),
					array(
						'Title' => 'required'
					)
				);
				
				if ($validator->fails()){
					return Redirect::route('admin.music')->withErrors($validator)->withInput();
				}
				
				$music = Music::find(Input::get('id'));
				$music->title = Input::get('title');
				if(!is_null(Input::file('file_name'))){
					$mime = Input::file('file_name')->getMimeType();
					if($mime !== 'audio/mpeg'){
						$error = "You have to input audio MP3 file";
						return Redirect::route('admin.music')->withErrors($error)->withInput();
					}
					if(!file_exists($this->upload_path)) {
						mkdir($this->upload_path, 0777, true);
					}
					$file = Input::file('file_name');
					if($file->isValid()){
						$filename        = "subud_".str_random(10);
						$extension       = $file->getClientOriginalExtension();
						$upload_name     = $filename.".".$extension;
						$upload_success = $file->move($this->upload_path, $upload_name);
						
						if( $upload_success ) {
						  $music->file_name = $this->upload_path.$upload_name;
						} else {
						  $error = "Failed uploading file";
						  return Redirect::route('admin.music')->withErrors($error)->withInput();
						}
						$music->save();
					}
					else {
					  $error = "Invalid file";
					  return Redirect::route('admin.music')->withErrors($error)->withInput();
					}
				}
				$music->save();
			}
		}
		
		return Redirect::route('admin.music');
	}
}