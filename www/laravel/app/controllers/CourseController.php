<?php

class CourseController extends \BaseController {

	/**
	* Constructor handles authentication check
	*/
	public function __construct() {
		$this->beforeFilter('auth');
		$this->beforeFilter('csrf', array('on' => 'post'));
		$this->beforeFilter('ajax', array('only' => array(
			'postCreate', 'postEdit', 'postDelete', 'postToggleModule', 'postRemoveStudent')));

		$this->beforeFilter(function($route) {
			if(!Auth::user()->isInstructor()) {
				return App::abort(403);
			}
		});

		$this->beforeFilter(function($route) {
			$course = Input::get('course');
			if(!Auth::user()->courses->contains($course)) {
				return App::abort(403);
			}
		}, 
		array('only' => array(
				'postEdit',
				'postDelete',
				'postToggleModule',
				'postRemoveStudent'
		)));
	}

	/**
	 * Display a listing of all courses belonging to instructor
	 */
	public function getIndex() {
		$data = Auth::user()->courses()->where('course_role', '=', 2)->get();
		$courses = array();

		foreach($data as $c) {

			// Processes and organizes information so that it can be used by the view
			$courses[$c->id]['course'] = $c;
			$courses[$c->id]['totalSections'] = 0;
			foreach($c->modules as $m) {
				$courses[$c->id]['totalSections'] += $m->sections->count();
			}

			$students = $c->students()->with('progress.section')->get();
			$users = array();
			foreach($students as $s) {
				$users[$s->id]['user'] = $s;
				$users[$s->id]['progress'] = 0;
				$users[$s->id]['correct'] = 0;

				foreach($c->modules as $m) {
					$users[$s->id]['mprogress'][$m->id] = 0;
				}

				foreach($s->progress as $p) {
					if(isset($users[$s->id]['mprogress'][$p->section->module_id])) {
						$users[$s->id]['sections'][$p->section->id] = $p;
						$users[$s->id]['correct'] += $p->correct;
						if($p->status > 0) {
							$users[$s->id]['mprogress'][$p->section->module_id]++;
							$users[$s->id]['progress']++;
						}
					}
					if($p->isLastSection()) {
						$users[$s->id]['lastSection'] = $p->section;
					}
				}
			}


			$courses[$c->id]['users'] = $users;
		}
		
		return View::make('course.display')->withCourses($courses);
	}

	/**
	 * Display details for a specific course
	 */
	public function getDetails($id) {
		if(Auth::user()->courses->contains($id)) {
			$course = Course::find($id);
			return View::make('course.details')->with('course',$course);
		}
		return App::abort(403);
	}

	/** 
	 * Ajax call
	 * Set the enabled status of a module
	 */
	public function postToggleModule() {
		$course = Input::get('course');
		$module = Input::get('module');
		$enabled = Input::get('enabled');
		Course::find($course)->modules()->updateExistingPivot($module, array('enabled' => $enabled));
	}

	/**
	 * Removes a student from a course
	 */
	public function postRemoveStudent() {
		$course = Input::get('course');
		$user = Input::get('user');
		Course::find($course)->users()->detach($user);
		User::find($user)->progress->each(function($p) {
			$p->course_id = 0;
			$p->save();
		});
	}

	/**
	 * Ajax call
	 * Creates a new course
	 */
	public function postCreate() {
		$course = Course::create(array());
		$course->name = Input::get('name');
		$course->token = uniqid($course->id);

		foreach(Module::all() as $module) {
			$course->allModules()->attach($module->id);
		}
		
		Auth::user()->courses()->save($course, array('course_role' => 2));
	}

	/**
	 * Ajax call
	 * Edit a course
	 */
	public function postEdit($id) {

	}

	/**
	 * Ajax call
	 * Deletes an instructor's course
	 */
	public function postDelete($id) {
		$course = Course::find($id);
		$course->users()->detach();
		$course->allModules()->detach();
		$course->delete();
	}

}
