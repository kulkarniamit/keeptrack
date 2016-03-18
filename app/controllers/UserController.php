<?php
/**
 * Created by PhpStorm.
 * User: amit
 * Date: 3/17/16
 * Time: 11:40 AM
 */
//use BaseController;
//use View;
//use Input;
//use Redirect;

class UserController extends BaseController
{
    public $layout = 'layouts.users.userdefault';

    public function __construct(\Interfaces\IUserRepository $user){
        $this->user = $user;
        /*  Make sure Laravel Auth uses this table for authentication instead of default 'users'    */
        Config::set('auth.model', 'User');
    }

    public function validateUserCredentials() {
        $validUser = $this->user->validateUserCredentials();
        if($validUser){
            return Redirect::to('dashboard');
        }
        else{
            //Password mismatch
            return Redirect::to('login')->with('login_error', 'Invalid Email or Password');
        }
    }

    public function showLogin(){
        $this->layout->content	= View::make('login');
    }

    public function showLogout() {
        \Auth::logout();
        \Session::flush();
        /*
         * Reference to prevent logout problems :
         * http://www.laravelmy.com/2014/04/16/fixing-the-argument-1-passed-to-illuminateauthguard-error/
         *
         */

        return Redirect::to('login');
    }

    public function showDashboard(){
        $allApplications = \Application::orderBy('created_at','desc')->paginate(10);
        $numberOfApplications = \Application::count();
        $this->layout->content = View::make('dashboard')->with('allApplications',$allApplications)
                                                        ->with('numberOfApplications',$numberOfApplications);
    }

    public function showRegistrationPage(){
        $this->layout->content	= View::make('register');
    }

    public function registerUser(){
        $rules      = $this->user->getRegistrationValidationRules();
        $messages = array(
            'firstname.required' => 'Please enter the First Name',
            'lastname.required' => 'Please enter the Last Name',
        );
        $validator  = $this->user->validateUser(Input::all(), $rules, $messages);

        if ($validator->passes()) {
            // validation has passed, save user in DB
            $newuser = $this->user->saveUser();
            $this->user->sendWelcomeMail($newuser);
            return Redirect::to('login')->with('registration_success_message', 'Registration Successful, please Login');
        }
        else{
            // validation has failed, display error messages
            return Redirect::to('register')
                        ->with('message', 'Please correct the following errors')
                        ->withErrors($validator)->withInput();
        }
    }

    public function showApplicationAdd(){
        $this->layout->content	= View::make('addapplication');
    }

    public function addJobApplication(){
        $rules      = $this->user->getJobApplicationRules();
        $messages = array(
            'jobid.required'    => 'JOB # is required (helps you in tracking)',
            'jobid.unique'      => 'Looks like you have already applied for this job!',
            'company.required'  => 'Oops, you forgot you insert the Company name',
            'role.required'     => 'Please enter the role you are applying for',
            'joblink.url'=> 'That does not look like a valid URL, please check again'
        );
        $validator  = $this->user->validateUser(Input::all(), $rules, $messages);

        if ($validator->passes()) {
            // validation has passed, save the job in DB
            $newjob = $this->user->saveJobApplication();
            return Redirect::to('dashboard')->with('addition_success_message', 'Job added Successfully');
        }
        else{
            // validation has failed, display error messages
            return Redirect::to('addapplication')
                ->with('message', 'Please correct the following errors')
                ->withErrors($validator)->withInput();
        }

    }
}

?>