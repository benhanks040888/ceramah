<?php namespace App\Models;

use DB,Str;

class Posts extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	 
	protected $table = 'posts';
	
	private static $myTable = 'posts';
	
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $guarded = array(
  
  );

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array(
		
	);
	
	public static function scopePerson($query,$pers)
	{
		return $query->where('person','=',$pers);
	}
	
	public static function scopeType($query,$type)
	{
		return $query->where('type','=',$type);
	}
	
	public static function getInitials()
	{
		return DB::table(self::$myTable)
				->select(DB::raw("DISTINCT(UCASE(LEFT(title,1))) AS init"))
				->orderBy('title')
				->get();
	}
	
	public static function getInitialsEn()
	{
		return DB::table(self::$myTable)
				->select(DB::raw("DISTINCT(UCASE(LEFT(title_en,1))) AS init"))
				->orderBy('title_en')
				->get();
	}
	
	public static function getTitleByInitials($init)
	{
		return DB::table(self::$myTable)
				->select(DB::raw("DISTINCT(title) AS title"))
				->where('title','like',$init.'%')
				->orderBy('title')
				->get();
	}
	
	public static function getTitleByInitialsEn($init)
	{
		return DB::table(self::$myTable)
				->select(DB::raw("DISTINCT(title_en) AS title"))
				->where('title_en','like',$init.'%')
				->orderBy('title_en')
				->get();
	}
	
	public static function getTitleByPersonAndType($person = '', $type = '')
	{
		return DB::table(self::$myTable)
				->select(DB::raw("DISTINCT(title) AS title"))
				->where('person','like',$person)
				->where('type','like',$type)
				->get();
	}
	
	public static function getTitleByPersonAndTypeEn($person = '', $type = '')
	{
		return DB::table(self::$myTable)
				->select(DB::raw("DISTINCT(title_en) AS title"))
				->where('person','like',$person)
				->where('type','like',$type)
				->get();
	}
	
	public static function getTitleByPersonAndTypeAndInitial($person = '', $type = '',$init = '')
	{
		return DB::table(self::$myTable)
				->select(DB::raw("DISTINCT(title) AS title"))
				->where('person','like',$person)
				->where('type','like',$type)
				->where('title','like',$init.'%')
				->get();
	}
	
	public static function getTitleByPersonAndTypeAndInitialEn($person = '', $type = '',$init = '')
	{
		return DB::table(self::$myTable)
				->select(DB::raw("DISTINCT(title_en) AS title"))
				->where('person','like',$person)
				->where('type','like',$type)
				->where('title_en','like',$init.'%')
				->get();
	}
	
	public static function getPostsByPersonAndTypeAndTitle($person = '', $type = '', $title = '')
	{
		return DB::table(self::$myTable)
				->where('title','like',$title)
				->where('person','like',$person)
				->where('type','like',$type)
				->get();
	}
	
	public static function getPostsByPersonAndTypeAndTitleEn($person = '', $type = '', $title = '')
	{
		return DB::table(self::$myTable)
				->where('title_en','like',$title)
				->where('person','like',$person)
				->where('type','like',$type)
				->get();
	}
	
	public static function getPostsByTitle($title = '')
	{
		return DB::table(self::$myTable)
				->where('title','like',$title)
				->get();
	}
	
	public static function searchByTitleOrCode($term)
	{
		return DB::table(self::$myTable)
				->where('title','like','%'.$term.'%')
				->orWhere('code','like','%'.$term.'%')
				->orderBy('title')
				->get();
	}
	
	public static function searchByTitleOrCodeEn($term)
	{
		return DB::table(self::$myTable)
				->where('title_en','like','%'.$term.'%')
				->orWhere('code_en','like','%'.$term.'%')
				->orderBy('title_en')
				->get();
	}
	
	//--------------------datatable---------------------------
        
	public static function getDatatable($options)
	{
		$select = array();
		foreach($options['columns'] as $column){
			array_push($select,$column['name']);
		}
		if(empty($select))$select = "*";
			
		if($options['isSearch']){
			$i = 0;
			foreach($options['sSearch'] as $key => $value){
				$searchTerm[$i] = $key." LIKE '%".$value."%'";
				$i++;
			}
			$extra = "";
			if(!empty($options['type']))
				$extra .= " AND `type` = '".$options['type']."'";
			if(!empty($options['person']))
				$extra .= " AND `person` = '".$options['person']."'";
			
			$search = implode(' OR ',$searchTerm);
			$search = "(".$search.") ".$extra;
			
			$return['total_data'] = DB::table(self::$myTable)->whereRaw($search)->count();
			$return['data'] = DB::table(self::$myTable)->select($select)
				->whereRaw($search)
				->orderBy($options['columns'][($options['sort_column'])]['name'],$options['sort_direction'])
				->skip($options['iDisplayStart'])
				->take($options['iDisplayLength'])
				->get();
		}
		else{
			$return['total_data'] = DB::table(self::$myTable)->where('type','=',$options['type'])->where('person','=',$options['person'])->count();
			$return['data'] = DB::table(self::$myTable)
				->select($select)
				->where('type','=',$options['type'])
				->where('person','=',$options['person'])
				->orderBy($options['columns'][($options['sort_column'])]['name'],$options['sort_direction'])
				->skip($options['iDisplayStart'])
				->take($options['iDisplayLength'])
				->get();
		}
		
		return $return;
	}
}