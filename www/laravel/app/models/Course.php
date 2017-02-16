<?php

Class Course extends Eloquent {
	protected $table = 	'courses';

	/**
	 * Returns a collection of all the user's in the course
	 */
	public function users() {
		return $this->belongsToMany('User')->withPivot('course_role')->orderBy('user_id');
	}

	/**
	 * Returns a collection of all the instructors for the course
	 */
	public function instructors() {
		return $this->belongsToMany('User')->whereRaw('course_role = 2');
	}

	/**
	 * Returns a collection of all the students in the course
	 */
	public function students() {
		return $this->belongsToMany('User')->whereRaw('course_role = 1')->orderBy('user_id');
	}

	/**
	 * Returns a collection of all enabled modules for the course
	 */
	public function modules() {
		return $this->belongsToMany('Module')->withPivot('enabled')->whereRaw('enabled = 1');
	}

	/**
	 * Returns a collection of the modules for the course
	 */
	public function allModules() {
		return $this->belongsToMany('Module')->withPivot('enabled');
	}

	/**
	 * Returns a collection of the section progress of all users in the course
	 */
	public function progress() {
		return $this->hasMany('SectionProgress');
	}

}