<?php

class AccountController extends BaseController {

	public function __construct() {
		$this->beforeFilter('auth', array('except' => array('getLogin', 'postLogin', 'getRecover', 'postRecover', 'getReset', 'postReset', 'getRegister', 'postRegister', 'getConfirm', 'postConfirm')));
		$this->beforeFilter('csrf', array('on' => 'post', 'except' => array('postRecover', 'postReset', 'postConfirm')));
	}

    /**
    * Displays Login Page
    */
    public function getIndex() {
    	return Redirect::to('account/login');
    }

    /*
    * Swaps user account types
    * Student <-> Instructor
    */
    public function postSwap() {
    	return 'swapping';
    }

    public function postSwapToStudent() {

    	// check for courses belonging to current user
    	$user = User::find(Auth::id());

    	$myCourses = Course::whereHas('users', function($query) use ($user){
    		$query->where('course_role', '2')->where('user_id',$user->id);
    	})->get();

    	if (count($myCourses) == 0) {
    		$user->is_instructor = 0;
    		$user->save();    		
    		return Redirect::back()->with('successMessage', 'Swapped to Student account');
    	} else {
    		return Redirect::back()->with('errorMessage', 'You still have open courses. Please close them before switching account types');
    	}
    }

    public function postSwapToInstructor() {
    	
    	// check to see if user is registered to a class
    	$user = User::find(Auth::id());

    	$course_status = $user->courses;

    	// ensure student is not a part of any classes
    	if (count($course_status) > 0) {
    		return Redirect::back()->with('errorMessage', $course_status);
    	} else {
    		// update db value, return success
    		$user->is_instructor = 1;
    		$user->save();    		
    		return Redirect::back()->with('successMessage', 'Swapped to Instructor account');
    	}
    }

	/*
	* Displays Info page
	* Info contains course information, progress, and account modification options
	*/
	public function getInfo() {
		return View::make('account.info')->withUser( User::find(Auth::user()->id) );
	}

	/*
	* Handles form request to change user password
	*/
	public function postChangePassword() {

		// validate new password fields
		$validator = Validator::make(Input::all(),array('old_password' => 'required',
			'new_password' => 'required|min:6|alpha_num',
			'confirm_password' => 'required|min:6|alpha_num'));	

		if ($validator->passes()) {

			// ensure old password is correct
			if (! Auth::validate(array('email' => Auth::user()->email, 'password' => Input::get('old_password')))) {
				return Redirect::to('account/info')->with('errorMessage','Incorrect Password');	
			}

			// Ensure new passwords match
			if (Input::get('new_password') != Input::get('confirm_password')) {
				return Redirect::to('account/info')->with('errorMessage','Passwords must match');	
			}

			$user = User::find(Auth::id());
			$user->password = Hash::make(Input::get('new_password'));
			$user->save();

			return Redirect::to('account/info')->with('successMessage','Changed Password');
		} else {
			return Redirect::to('account/info')->with('errorMessage','Failed to Change Password')->withErrors($validator)->withInput();	
		}
	}

	/*
	* Handles course registration and account modification requests sent from account info apge
	*/
	public function postInfo() {

	}
	
	public function getRegister() {
		return View::make('account.register');
	}

	public function postRegister() {
		$validator = Validator::make(Input::all(), User::$rules);
		if ($validator->passes()) {

            // create DB entry
			$user = new User;
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
            $user->confirmed = md5(rand());

			$user->save();

            // send email to user to confirm account
            $targetEmail = Input::get('email');
            $data = array('id' => $user->id, 'code' => $user->confirmed);
            Mail::send('emails.confirm', $data, function($message) use ($targetEmail)
            {
                $message->to($targetEmail, '')->subject('Confirm Your LearnPLC Account');
            });

			return Redirect::to('account/login')->with('successMessage', 'Account created, please respond to the verification email sent to your inbox before continuing');
		} else {
			return Redirect::to('account/register')->with('errorMessage', 'Failed to create account.')->withErrors($validator)->withInput();
		}
	}

	public function getLogin() {
		if(Auth::check()) {
			return Redirect::to('/');
		}
		return View::make('account.login');
	}

	public function postLogin() {
		$email = Input::get('email');
		$password = Input::get('password');

        // ensure account has been confirmed
        if (Auth::validate(array('email' => $email, 'password' => $password))) {
            $user = User::where('email', '=', $email)->first();
            if ($user->confirmed != 1) {
                // account exists, but has not been confirmed yet
                return View::make('account/confirm')->with('success', 'resend');
            }
        }


		if (Auth::attempt(array('email'=>$email, 'password'=>$password))) {
			Auth::user()->last_login_at = new DateTime;
			Auth::user()->save();
			return Redirect::intended('modules')->with('message', 'You are now logged in!');
		} else {
			return Redirect::to('account/login')->with('errorMessage', 'Your username/password combination was incorrect.')->withInput();
		}
	}

	/** Handle logout */
	public function postLogout() {
		Auth::logout();
		return Redirect::to('/');
	}

	// Password reset functions
	/**
	 * Display the password reminder view.
	 *
	 * @return Response
	 */
	public function getRecover()
	{
		return View::make('account.recover');
	}

	/**
	 * Handle a POST request to remind a user of their password.
	 *
	 * @return Response
	 */
	public function postRecover()
	{

		switch ($response = Password::remind(Input::only('email'), function($message) {
			$message->subject('LearnPLC Password Reset');
		}))
		{
			case Password::INVALID_USER:
			// return 'invalid user';
			return Redirect::back()->with('errorMessage', Lang::get($response));

			case Password::REMINDER_SENT:
			// return 'sent';
			return Redirect::back()->with('successMessage', Lang::get($response));
		}
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function getReset($token = null)
	{
		if (is_null($token)) App::abort(404);

		return View::make('account.reset')->with('token', $token);
	}



	/**
	 * Handle a POST request to reset a user's password.
	 *
	 * @return Response
	 */
	public function postReset()
	{
		$credentials = Input::only(
			'email', 'password', 'password_confirmation', 'token'
			);

		$response = Password::reset($credentials, function($user, $password)
		{
			$user->password = Hash::make($password);

			$user->save();
		});

		switch ($response)
		{
			case Password::INVALID_PASSWORD:
			case Password::INVALID_TOKEN:
			case Password::INVALID_USER:
			return Redirect::back()->with('errorMessage', Lang::get($response));

			case Password::PASSWORD_RESET:
			return Redirect::back()->with('successMessage', 'Password has been changed');
		}
	}

	public function getAccountTypes() {
		return View::make('pages.account_types');
	}
    
    public function getConfirm($id, $code) {
        $user = User::find($id);
        if ($user->confirmed == $code) { // case 1: account needs to be confirmed, code matches
            // change confirmed value to true
            $user->confirmed = 1;
            $user->save();
            return View::make('account.confirm')->with('success','true');
        } else if ($user->confirmed == 1) { // case 2: account already confirmed
            return View::make('account.confirm')->with('success','conf');
        } else { // probably a bad or old link
            return View::make('account.confirm')->with('success','false');
        }
    }

    public function postConfirm() {

        // send email to user to confirm account
        $targetEmail = Input::get('email');
        $user = User::where('email', '=', $targetEmail)->first();
        $data = array('id' => $user->id, 'code' => $user->confirmed);
        Mail::send('emails.confirm', $data, function($message) use ($targetEmail)
        {
            $message->to($targetEmail, '')->subject('Confirm Your LearnPLC Account');
        });

        return Redirect::back()->with('successMessage', 'Confirmation Email Re-Sent');
    }
	
}
