<?php

class BaseController extends Controller {

	/**
	 * Set CSRF filter on every POST request
	 *
	 * @return void
	 */
  public function __construct()
  {
    $this->beforeFilter('csrf', array('on' => 'post'));
  	$this->checkLangCookie();
  }

  private function checkLangCookie()
  {
  	if(!Cookie::get('subud_lang')){
  		Cookie::queue('subud_lang','id');
  		$response = Response::make('');
  	}
  }
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
