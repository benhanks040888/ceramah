<?php namespace App\Models;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

use Sentry;

class User extends \Cartalyst\Sentry\Users\Eloquent\User implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = array(
    'email',
    'password',
    'first_name',
    'last_name',
    'profile_picture',
    'fb_id'
  );

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array(
		'password',
    'old_password',
		'reset_password_code',
		'activation_code',
		'remember_token'
	);

  /**
   * function isAdmin
   *
   * @return string
   */
  public function isAdmin()
  {
    return Sentry::check() && Sentry::getUser()->hasAccess('admin');
  }

}