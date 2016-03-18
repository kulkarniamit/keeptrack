<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	public static $rules = array(
		'username'          =>'required|alpha|min:3|unique:users',
		'firstname'         =>'required|alpha|min:2',
		'lastname'          =>'required|alpha|min:2',
		'school'            =>'required|min:3',
		'email'             =>'required|email|unique:users',
		'password'          =>'required|between:6,12',
		'gender'            =>'required|size:1',
	);

}
