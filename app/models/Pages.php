<?php namespace App\Models;

use DB;

class Pages extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pages';
	
	private static $section = array(
			'tentang-bapak' => 'Tentang Bapak',
			'kata-pembuka' => 'Kata Pembuka',
			'sangkalan' => 'Sangkalan'
		);

	public $timestamps = true;
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
	
	public static function scopeSection($query,$section)
	{
		return $query->where('section','=',$section);
	}
	
	public static function scopeLanguage($query,$lang)
	{
		return $query->where('language','=',$lang);
	}
	
	public static function getSections()
	{
		return self::$section;
	}
	
	public static function getSectionBySlug($slug = "")
	{
		if(!isset(self::$section[$slug]))
			return false;
		$section = self::$section[$slug];
		return $section;
	}
}