<?php namespace App\Controllers\Admin;

use BaseController;
use DB, Str, View, Input, Redirect, Validator, Image, File;
use App\Models\Gallery;

class GalleryController extends BaseController {

	private $upload_path = 'uploads/gallery/';
	public function __construct()
	{
		$this->col = array(
						array(
				'name' => 'id',
				'alias' => 'id',
				'type' => 'TEXT',
								'hidden' => true,
								'unsearchable' => true
			),
						array(
				'name' => 'title',
				'alias' => 'Title',
				'type' => 'TEXT',
								'hidden' => false,
								'unsearchable' => false
			),            
						
						array(
				'name' => 'image',
				'alias' => 'Image',
				'type' => 'TEXT',
								'hidden' => false,
								'unsearchable' => true
			),            
						
						array(
				'name' => 'created_at',
				'alias' => 'Created Date',
				'type' => 'DATETIME',
								'hidden' => false,
								'unsearchable' => true
			)
		);		
	}
	
	
	public function getList()
	{
		$data['fields'] = $this->col;
		$data['num_fields'] = count($this->col);
	
		$get = Gallery::get();
		$data['result'] = $get;
		$data['qtyParticipant'] = $get->count();
		return View::make('admin.site.gallery',$data);
	}
	
	public function getFormAdd()
	{
		$data = array();
		$data['action'] = "Add";
		$data['input'] = Input::old();
		return View::make('admin.site.form.gallery',$data);
	}
	
	public function getFormEdit($id)
	{
		$data = array();
		$input = Gallery::find($id);
		if(is_null($input)){
			return Redirect::route('admin.gallery');
		}
		$data['action'] = "Edit";
		$data['input'] = Input::old();
		if(!$data['input']){
			$data['input'] = $input;
		}
		$data['formProcess'] = "editProcess";
		return View::make('admin.site.form.gallery',$data);
	}
	
	public function postList()
	{
		$search = array();
		$is_search = false;
		if(Input::get('sSearch',TRUE) != ""){
			$is_search = true;
			foreach($this->col as $key){
				if(isset($key['boolean']) and $key['unsearchable'] == false){
					if(strtolower(Input::get('sSearch',TRUE)) == 'yes')$search[$key['name']] = 1;
					else if(strtolower(Input::get('sSearch',TRUE)) == 'no')$search[$key['name']] = 0;
				}
				else if($key['unsearchable'] == false){
					$search[$key['name']] = Input::get('sSearch',TRUE);
				}
				
				if($key['type'] == 'ENTITY_DECODE'){
					$search[$key['name']] = htmlentities(Input::get('sSearch',TRUE)) ;
				}
			}
		}
		
		$options = array(
				'iDisplayLength'=> Input::get('iDisplayLength',TRUE), // number of records displayed
				'iDisplayStart'	=> Input::get('iDisplayStart',TRUE), // record viewing offset
				'sort_column' => Input::get('iSortCol_0',TRUE),
				'sort_direction' => Input::get('sSortDir_0',TRUE),
				'columns' => $this->col,
				'sSearch' => $search, 
				'isSearch' => $is_search, //flag indicate a search
				'filter' => Input::get('filter') //all, yes, or no
		);
		
		$rowset = Gallery::getDatatable($options);
		$aaData = array();
		foreach($rowset['data'] as $row){
			array_push($aaData, $row);
		}
		$cleanSet = json_decode(json_encode($aaData));
		$aaData = array();
		foreach($cleanSet as $clean){
			$cleanArr = get_object_vars($clean);
			$arr = array();
			foreach($cleanArr as $data){
				array_push($arr,$data);
			}
			array_push($arr,""); //to enable 1 extra column for Actions
			array_push($aaData,$arr);
		}
		$iTotalRecords = $rowset['total_data'];
		$iTotalDisplayRecords = $rowset['total_data'];
		$result = array("aaData" => $aaData,"iTotalRecords" => $iTotalRecords,"iTotalDisplayRecords" => $iTotalDisplayRecords);
		echo json_encode($result);
	}
	
	public function postSubmit(){
		if(Input::get('_action') == 'addProcess'){
			$validator = Validator::make(
				array(
					'Title' => Input::get('title'),
					'Image File' => Input::file('image')
				),
				array(
					'Title' => 'required|unique:gallery,title',
					'Image File' => 'required|image'
				)
			);
			if ($validator->fails()){
				return Redirect::route('admin.gallery.add')->withErrors($validator)->withInput();
			}
				
			$gallery = new Gallery;
			$gallery->title = Input::get('title');
			$gallery->person = 'bapak';
			if(!file_exists($this->upload_path)) {
				mkdir($this->upload_path, 0777, true);
			}
			if(!is_null(Input::file('image'))){
				$file = Input::file('image');
				if($file->isValid()){
					$extension = $file->getClientOriginalExtension();
					$img = Image::make($file->getRealPath());
					$img->fit(600, 600);
					$img->interlace();
					$name = $gallery->title.'_'.uniqid();
					$fileName = $this->upload_path.Str::slug($name).'.'.$extension;
					$img->save($fileName);
					$gallery->image = $fileName;
					
					$img->fit(300,300);
					$img->interlace();
					$fileName = $this->upload_path.Str::slug($name).'_thumb.'.$extension;
					$img->save($fileName);
					$gallery->thumbnail = $fileName;
				}
			}
			$gallery->save();
			
			if(!$gallery->id){
				throw new \Exception('Gallery insert error');
			}
		}
		elseif(Input::get('_action') == 'editProcess'){
			if(Input::has('id')){
				$validator = Validator::make(
					array(
						'Title' => Input::get('title'),
						'Image File' => Input::file('image')
					),
					array(
						'Title' => 'required|unique:gallery,title,'.Input::get('id'),
						'Image File' => 'image'
					)
				);
				if ($validator->fails()){
					return Redirect::route('admin.gallery.edit',array('id' => Input::get('id')))->withErrors($validator)->withInput();
				}
				
				DB::transaction(function()
				{
					$gallery = Gallery::find(Input::get('id'));
					$gallery->title = Input::get('title');
					$gallery->person = 'bapak';
					if(!file_exists($this->upload_path)) {
						mkdir($this->upload_path, 0777, true);
					}
					if(!is_null(Input::file('image'))){
						$this->deleteImage($gallery);
						$file = Input::file('image');
						if($file->isValid()){
							$extension = $file->getClientOriginalExtension();
							$img = Image::make($file->getRealPath());
							$img->fit(600, 600);
							$img->interlace();
							$name = $gallery->title.'_'.uniqid();
							$fileName = $this->upload_path.Str::slug($name).'.'.$extension;
							$img->save($fileName);
							$gallery->image = $fileName;
							
							$img->fit(300,300);
							$img->interlace();
							$fileName = $this->upload_path.Str::slug($name).'_thumb.'.$extension;
							$img->save($fileName);
							$gallery->thumbnail = $fileName;
						}
					}
					$gallery->save();
				});
			}
		}
		return Redirect::route('admin.gallery');
	}
	
	public function postDelete()
	{
		if(Input::has('id')){
			DB::transaction(function()
			{
				$gallery = Gallery::find(Input::get('id'));
				$this->deleteImage($gallery);
				Gallery::destroy(Input::get('id'));
				echo "1";
			});
		}
		else{
			echo "0";
		}
	}
	
	private function deleteImage($gallery)
	{
		if(!empty($gallery->image)){
			File::delete($gallery->image);
		}
		if(!empty($gallery->thumbnail)){
			File::delete($gallery->thumbnail);
		}
		return true;
	}
}