<?php

class JobapplicationController extends \BaseController {

	public function __construct(\Interfaces\IUserRepository $user){

		$this->user = $user;
//		$this->beforeFilter('check_student_logged_in');
		$this->beforeFilter('csrf', array('on'=>'post'));
		/*  Make sure Laravel Auth uses this table for authentication instead of default 'users'    */
//		\Config::set('auth.model', '\eschoolnetwork\Models\User');
		Config::set('auth.model', 'User');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Response::json(Application::whereUserId(Auth::user()->id)->orderBy('created_at','desc')->get());
//		return Response::json(Application::whereUserId(Auth::user()->id)->get());
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// We are finally getting the update data!
//		return Input::all();
		$currentJob = Application::find($id);
		if ($currentJob->jobid == Input::get('jobid')){
			$rules = array(
				'company'               =>'required|min:2',
				'role'                  =>'required|min:2',
			);
		}
		else{
			$rules = array(
				'jobid'                 =>'required|unique:applications',
				'company'               =>'required|min:2',
				'role'                  =>'required|min:2',
//			'joblink'               =>'url',
//			'appliedon'             =>'required',
			);
		}

		$messages = array(
			'jobid.required'    => 'JOB # is required (helps you in tracking)',
			'jobid.unique'      => 'Looks like you have already applied for this job!',
			'company.required'  => 'Oops, you forgot you insert the Company name',
			'role.required'     => 'Please enter the role you are applying for',
			'joblink.url'=> 'That does not look like a valid URL, please check again'
		);
		$validator  = $this->user->validateUser(Input::all(), $rules, $messages);

		if ($validator->passes()) {
			try {
				// First, update the counter
				$currentJob = Application::find($id);
				if(empty($currentJob)){
					// There are chances that a job might have been deleted before
					// a user tries again. The user who might be seeing it on screen
					// when tries to delete on a non-existent application, we cannot proceed.
					// hence Abort and return false
					\Log::info('Attempt to delete a non-existent job application');
					$responseData['error']  =   "The job application has already been deleted";
					$responseData['updateSuccess']    =   false;
					return json_encode($responseData);
				}
				else{
					$currentJob->jobid      = Input::get('jobid');
					$currentJob->company    = ucfirst(Input::get('company'));
					$currentJob->role       = ucfirst(Input::get('role'));
//					$currentJob->joblink    = Input::get('joblink');
//					$currentJob->application_status = "Applied";
//					$currentJob->applied_on = Input::get('applied_on');
					$currentJob->save();
					$responseData['updateSuccess']    =   true;
					return json_encode($responseData);
				}
			} catch (Exception $exc) {
				\Log::error($exc->getMessage());
				$responseData['error']  =   "Something went wrong,we are working hard on fixing it and empowering you";
				$responseData['updateSuccess']    =   false;
				return json_encode($responseData);
			}
		}
		else{
			$responseData['updateSuccess']    =   false;
			$responseData['error']      = json_decode($validator->messages());
			return json_encode($responseData);
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Application::destroy($id);
		return Response::json(array('deleteSuccess' => true));
	}


}
