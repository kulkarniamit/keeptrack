<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('before'=>'ifUserLoggedIn',function()
{
//	return View::make('hello');
	return View::make('index');
}));

Route::get('register',	array('uses'=>'UserController@showRegistrationPage'));
Route::post('register',	array('before'=>'csrf','uses'=>'UserController@registerUser'));
Route::get('login',		array('before'=>'ifUserLoggedIn','uses'=>'UserController@showLogin'));
Route::post('login',	array('before'=>'csrf','uses'=>'UserController@validateUserCredentials'));
Route::get('dashboard',	array('before'=>'isUserLoggedIn','uses'=>'UserController@showDashboard'));
Route::get('logout',	array('before'=>'isUserLoggedIn','uses'=>'UserController@showLogout'));

Route::get('addapplication',array('before'=>'isUserLoggedIn','uses'=>'UserController@showApplicationAdd'));
Route::post('addapplication',array('before'=>'csrf','uses'=>'UserController@addJobApplication'));

Route::get('change-password',array('before'=>'isUserLoggedIn','uses'=>'UserController@showChangePasswordPage'));
Route::post('pchandler',array('before'=>'csrf','uses'=>'UserController@changePassword'));