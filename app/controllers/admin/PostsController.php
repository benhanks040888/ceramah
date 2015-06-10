<?php namespace App\Controllers\Admin;

use BaseController;
use DB, Str, View, Input, Redirect, Validator, Image, File;
use App\Models\Posts;

class PostsController extends BaseController {

	private $accepted_type = array('surat','ceramah');
	private $accepted_person = array('bapak','ibu');
	
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
				'name' => 'code',
				'alias' => 'Code',
				'type' => 'TEXT',
								'hidden' => false,
								'unsearchable' => false
			),
						array(
				'name' => 'title',
				'alias' => 'Title',
				'type' => 'TEXT',
								'hidden' => false,
								'unsearchable' => false
			),
						array(
				'name' => 'tag',
				'alias' => 'Tag',
				'type' => 'TEXT',
								'hidden' => false,
								'unsearchable' => false
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
	
	
	public function getList($type='', $person='')
	{
		if(!in_array($type,$this->accepted_type) || !in_array($person,$this->accepted_person))
			return Redirect::route('admin.posts',array('type'=>'surat','person'=>'bapak'));
		
		$data['title'] = ucfirst($type).' '.ucfirst($person);
		$data['fields'] = $this->col;
		$data['num_fields'] = count($this->col);
	
		$get = Posts::Person($person)->Type($type)->get();
		$data['result'] = $get;
		$data['parameter'] = array('type'=>$type, 'person'=>$person);
		$data['qtyParticipant'] = $get->count();
		return View::make('admin.site.posts',$data);
	}
	
	public function getFormAdd($type='', $person='')
	{
		if(!in_array($type,$this->accepted_type) || !in_array($person,$this->accepted_person))
			return Redirect::route('admin.posts',array('type'=>'surat','person'=>'bapak'));
		
		$data = array();
		$data['title'] = ucfirst($type).' '.ucfirst($person).' - Add';
		$data['parameter'] = array('type'=>$type, 'person'=>$person);
		$data['input'] = Input::old();
		return View::make('admin.site.form.posts',$data);
	}
	
	public function getFormEdit($id)
	{
		$data = array();
		$input = Posts::find($id);
		if(is_null($input)){
			return Redirect::route('admin.posts');
		}
		$data['input'] = Input::old();
		if(!$data['input']){
			$data['input'] = $input;
		}
		$type = $data['input']['type'];
		$person = $data['input']['person'];
		$data['title'] = ucfirst($type).' '.ucfirst($person).' - Edit';
		$data['formProcess'] = "editProcess";
		$data['parameter'] = array('type'=>$type, 'person'=>$person);
		return View::make('admin.site.form.posts',$data);
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
				'type' => Input::get('type'), //surat or ceramah
				'person' => Input::get('person') //bapak or ibu
		);
		
		$rowset = Posts::getDatatable($options);
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
		$type = Input::get('type');
		$person = Input::get('person');
		
		if(!in_array($type,$this->accepted_type) || !in_array($person,$this->accepted_person))
			return Redirect::route('admin.posts',array('type'=>'surat','person'=>'bapak'));
	
		if(Input::get('_action') == 'addProcess'){
			$validator = Validator::make(
				array(
					'Code' => Input::get('code'),
					'Title' => Input::get('title'),
					'Tag' => Input::get('tag')
				),
				array(
					'Code' => 'required|unique:posts,code',
					'Title' => 'required',
					'Tag' => 'required'
				)
			);
			if ($validator->fails()){
				return Redirect::route('admin.posts.add',array('type'=>$type,'person'=>$person))->withErrors($validator)->withInput();
			}
				
			$posts = new Posts;
			$posts->title = Input::get('title');
			$posts->code = Input::get('code');
			$posts->tag = Input::get('tag');
			$posts->person = $person;
			$posts->type = $type;
			$posts->content_id = Input::get('content_id');
			$posts->content_en = Input::get('content_en');
			$posts->save();
			
			if(!$posts->id){
				throw new \Exception('Posts insert error');
			}
		}
		elseif(Input::get('_action') == 'editProcess'){
			if(Input::has('id')){
				$validator = Validator::make(
					array(
						'Code' => Input::get('code'),
						'Title' => Input::get('title'),
						'Tag' => Input::get('tag')
					),
					array(
						'Code' => 'required|unique:posts,code,'.Input::get('code'),
						'Title' => 'required',
						'Tag' => 'required'
					)
				);
				if ($validator->fails()){
					return Redirect::route('admin.posts.edit',array('id' => Input::get('id')))->withErrors($validator)->withInput();
				}
				
				$posts = Posts::find(Input::get('id'));
				$posts->title = Input::get('title');
				$posts->code = Input::get('code');
				$posts->tag = Input::get('tag');
				$posts->person = $person;
				$posts->type = $type;
				$posts->content_id = Input::get('content_id');
				$posts->content_en = Input::get('content_en');
				$posts->save();
			}
		}
		return Redirect::route('admin.posts',array('type'=>$type,'person'=>$person));
	}
	
	public function postDelete()
	{
		if(Input::has('id')){
			DB::transaction(function()
			{
				Posts::destroy(Input::get('id'));
				echo "1";
			});
		}
		else{
			echo "0";
		}
	}
}