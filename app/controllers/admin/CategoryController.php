<?php namespace App\Controllers\Admin;

use BaseController;
use DB, Str, View, Input, Redirect, Validator;
use App\Models\Category;

class CategoryController extends BaseController {

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
				'name' => 'category_id',
				'alias' => 'Category (ID)',
				'type' => 'TEXT',
								'hidden' => false,
								'unsearchable' => false
			),
						array(
				'name' => 'category_en',
				'alias' => 'Category (EN)',
				'type' => 'TEXT',
								'hidden' => false,
								'unsearchable' => false
			),
						array(
				'name' => 'belongs_to',
				'alias' => 'Person',
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
	
	
	public function getList()
	{
		$data['fields'] = $this->col;
		$data['num_fields'] = count($this->col);
	
		$get = Category::get();
		$data['result'] = $get;
		$data['qtyParticipant'] = $get->count();
		return View::make('admin.site.category',$data);
	}
	
	public function getFormAdd()
	{
		$owners = Category::getOwner();
		$data = array();
		$data['action'] = "Add";
		$data['owners'] = $owners;
		$data['input'] = Input::old();
		$data['input']['belongs_to'] = '';
		return View::make('admin.site.form.category',$data);
	}
	
	public function getFormEdit($id)
	{
		$owners = Category::getOwner();
		
		$data = array();
		$input = Category::find($id);
		if(is_null($input)){
			return Redirect::route('admin.category');
		}
		$data['action'] = "Edit";
		$data['input'] = Input::old();
		if(!$data['input']){
			$data['input'] = $input;
		}
		$data['owners'] = $owners;
		$data['formProcess'] = "editProcess";
		return View::make('admin.site.form.category',$data);
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
		
		$rowset = Category::getDatatable($options);
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
					'Category (ID)' => Input::get('category_id'),
					'Category (EN)' => Input::get('category_en'),
					'Belongs To' => Input::get('belongs_to')
				),
				array(
					'Category (ID)' => 'required',
					'Category (EN)' => 'required',
					'Belongs To' => 'required'
				)
			);
			if ($validator->fails()){
				return Redirect::route('admin.category.add')->withErrors($validator)->withInput();
			}
				
			$category = new Category;
			$category->category_id = Input::get('category_id');
			$category->category_en = Input::get('category_en');
			$category->belongs_to = Input::get('belongs_to');
			$category->save();
			
			if(!$category->id){
				throw new \Exception('Category insert error');
			}
		}
		elseif(Input::get('_action') == 'editProcess'){
			if(Input::has('id')){
				$validator = Validator::make(
					array(
						'Category (ID)' => Input::get('category_id'),
						'Category (EN)' => Input::get('category_en'),
						'Belongs To' => Input::get('belongs_to')
					),
					array(
						'Category (ID)' => 'required',
						'Category (EN)' => 'required',
						'Belongs To' => 'required'
					)
				);
				if ($validator->fails()){
					return Redirect::route('admin.category.edit',array('id' => Input::get('id')))->withErrors($validator)->withInput();
				}
			
				$category = Category::find(Input::get('id'));
				$category->category_id = Input::get('category_id');
				$category->category_en = Input::get('category_en');
				$category->belongs_to = Input::get('belongs_to');
				$category->save();
			}
		}
		return Redirect::route('admin.category');
	}
	
	public function postDelete()
	{
		if(Input::has('id')){
			Category::destroy(Input::get('id'));
			echo "1";
		}
		else{
			echo "0";
		}
	}
}