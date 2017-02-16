<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	public static $rules = array(
		'email'=>'required|email|unique:users',
		'password'=>'required|alpha_num|min:6|confirmed',
		'password_confirmation'=>'required|alpha_num|min:6'
		);

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

	/**
	* Returns an array that indicates which sections of a given module have been completed
	*/
	public function completedSections($module) {
		// list of completed sections by section ID
		// $secProg = SectionProgress::where('user_id', $this->id)->get();
		$secProg = SectionProgress::where('user_id', $this->id)->with('section')->get();

		$sections = array();
		foreach ($secProg as $completedSection) {
			if ($completedSection->section->module_id == $module) {
				// case: section has been correctly answered
				// if ($completedSection->correct == 1) {
				// 	$sections[$completedSection->section_id] = 1;
				// } else if ($completedSection->correct == 0) {
				// 	$sections[$completedSection->section_id] = 0;
				// }

				if($completedSection->status > 0) {
					$sections[$completedSection->section_id] = $completedSection->correct;
				}
				else {
					$sections[$completedSection->section_id] = 2;
				}
			}
		}
		return $sections;
	}

	/**
	* Returns a list of % completion of each module. 
	* Array index corresponds to module number
	*/
	public function moduleProgress() {

		// Gather database data
		$sections = Section::all();
		$secProg = SectionProgress::where('user_id', $this->id)->get();

		// init array with correct number of sections
		// progress array is an array of arrays:
		// [{Total Number of sections in Mod1, # sections completed in Mod1},
		// {Total number of sections in Mod2, # sections completed in Mod2, ... }]
		$progArray = array();
		foreach($sections as $section) {

			// check if  module already exists, if not add it
			if (!array_key_exists($section->module_id,$progArray)) {
				$progArray[$section->module_id] = array(0, 0, 0);
			}

			// increment section count
			$progArray[$section->module_id][0]++;
		}

		// add section values to array
		foreach($secProg as $prog) {

			// get module progress belongs to
			$parent_module = 0;
			foreach($sections as $section) {
				if ($section->id == $prog->section_id) {
					$parent_module = $section->module_id;
				}
			}

			// increment the counter representing a completed section
			if ($prog->status > 0) {
				$progArray[$parent_module][1] += $prog->correct;
				$progArray[$parent_module][2]++;
			}
		}

		// iterate through progress array, calculate % complete
		$modulePercent = array();
		$modulePercent[0] = ''; // null first value, so indexing for mod progress starts at 1
		foreach($progArray as $mod) {
			$modulePercent[] = array(($mod[1]) / ($mod[0]), ($mod[2]) / ($mod[0]));
		}

		return $modulePercent;
	}

	/**
	 * Returns a list of whether or not each module is enabled for users current course
	 */
	function enabledModules() {

		// get user course
		$myCourse = Course::whereHas('users', function($query) {
			$query->where('course_role', '1')->where('user_id',$this->id);
		})->first();

		// gather module list and init array
		$allModules = Module::all();
		$modulesList = array();

		// return array of 1s if user is not registered to a course
		if ($myCourse == null) {
			$modulesList = array_fill(0,count($allModules)+1,1);
			return $modulesList;
		}

		// gather list of enabled modules for user course
		$enabledModules = Module::select(array('id'))->whereHas('courses', function($q) use ($myCourse) {
			$q->where('course_id',$myCourse->id)->where('enabled',1);
		})->get();

		// generate a full list of modules and 
		$modulesList = array_fill(0,count($allModules),0);
		foreach ($allModules as $mod) {
			// check if current mod is present in modules
			foreach($enabledModules as $eMod) {
				if ($eMod->id == $mod->id) {
					// add to modules list as 1
					$modulesList[$mod->id] = 1;
				}
			}

		}

		return $modulesList;

	}

	/**
	 * Returns a student's course
	 */
	public function course() {
		return $this->belongsToMany('Course')->where("course_role", 1)->first();
	}

	/**
	 * Returns a collection of an instructor's courses
	 */
	public function courses() {
		return $this->belongsToMany('Course')->withPivot('course_role')->orderBy('id');
	}

	/**
	 * Returns a collection of the user's progress for each course;
	 */
	public function progress() {
		return $this->hasMany('SectionProgress');
	}

	/**
	 * Returns a collection of the user's roles
	 */
	public function roles() {
		return $this->belongsToMany('CourseRole', 'course_user')->withPivot('course_role');
	}


	/**
	 * Returns wether the user is an instructor
	 */
	public function isInstructor() {
		return $this->is_instructor;
	}

	/**
	 * Returns the last section progress
	 */
	public function lastSection() {
		return $this->hasMany('SectionProgress')->whereRaw('status = 2')->first();
	}

}
