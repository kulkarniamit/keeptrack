<?php
/**
 * Created by PhpStorm.
 * User: amit
 * Date: 3/17/16
 * Time: 11:46 AM
 */
namespace Repositories;
use Input;
use Auth;
use User;
use Validator;
use Hash;

class UserRepository implements \Interfaces\IUserRepository {
    /**
     * Validate the user email and password for login
     *
     * @return bool
     */
    public function validateUserCredentials() {
        $credentials = [
            'email'=>Input::get('email'),
            'password'=>Input::get('password')
        ];

        /*
         * Check if user wants us to remember him
         */

        $rememberMe = (Input::get('remember') == 'on' ? true : false);
        if(Auth::attempt($credentials,$rememberMe)){
            return true;
        }
        else{
            return false;
        }
    }

    public function getJobApplicationRules(){
        return \Application::$rules;
    }

    public function getRegistrationValidationRules()
    {
        return User::$rules;
    }

    public function validateUser($inputs,$rules,$messages){
        return Validator::make($inputs, $rules,$messages);
    }

    public function saveUser()
    {
        // validation has passed, save user in DB
        $newuser = new User;
        $newuser->username      = ucfirst(Input::get('username'));
        $newuser->first_name    = ucfirst(Input::get('firstname'));
        $newuser->last_name     = ucfirst(Input::get('lastname'));
        $newuser->school        = ucfirst(Input::get('school'));
        $newuser->email		    = Input::get('email');
        $newuser->password      = Hash::make(Input::get('password'));
        $newuser->gender        = Input::get('gender');
        try {
            $newuser->save();
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage());
            return Redirect::to('register')->with('message', 'Something went wrong,we are working hard on fixing it and empowering you');
        }
        return $newuser;
    }

    public function saveJobApplication(){
        // validation has passed, save user in DB
        $newjob = new \Application();
        $newjob->jobid      = Input::get('jobid');
        $newjob->user_id    = Auth::user()->id;
        $newjob->company    = ucfirst(Input::get('company'));
        $newjob->role       = ucfirst(Input::get('role'));
        $newjob->joblink    = Input::get('joblink');
        $newjob->application_status = "Applied";
        $newjob->applied_on = Input::get('appliedon');
        try {
            $newjob->save();
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage());
            return Redirect::to('register')->with('message', 'Something went wrong,we are working hard on fixing it and empowering you');
        }
        return $newjob;
    }
}
?>
