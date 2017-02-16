<?php

class UserController extends BaseController {

	public function __construct()
	{
		$this->beforeFilter('auth');
		$this->beforeFilter('csrf', array('on' => 'post'));
	}

	public function getIndex() {
		return "User Controller";
	}
	
	public function getProfile() {
		$user = Auth::user();
		$course = $user->course();
		$modules['modules'] = Module::all();

		foreach($modules['modules'] as $m) {
			$modules[$m->id]['progress'] = 0;
			$modules[$m->id]['correct'] = 0;
			$modules[$m->id]['optional'] = true;
		}

		if($course) {
			foreach($course->modules as $m) {
				$modules[$m->id]['optional'] = false;
			}
		}

		$data = $user->progress()->with('section')->get();
		foreach($data as $p) {
			$modules[$p->section->module_id][$p->section->id] = $p;
			$modules[$p->section->module_id]['correct'] += $p->correct;
			if($p->status > 0) {
				$modules[$p->section->module_id]['progress']++;
			}
		}	
		
		return View::make('user.profile')->withUser($user)->withModules($modules);
	}

	public function postLeaveCourse() {
		$user = User::find(Auth::user()->id);

		// remove relationship
		$user->courses()->detach($user->courses->first()->id);

		return Redirect::back()->with('successMessage', 'Left '.$user->courses->first()->name);
	}

	public function postRegisterCourse() {
		$code = Input::get('course_code');

		$user = User::find(Auth::user()->id);
		$course = Course::where('token',$code)->first();

		// redirect back with error if no matching course found
		if($course == '') {
			return Redirect::back()->with('errorMessage', 'Course with code '.$code.' not found');
		}

		// add relationship
		$user->courses()->attach($course->id, array('course_role' => 1));

		return Redirect::back()->with('successMessage', 'Joined '.$course->name);

	}

}