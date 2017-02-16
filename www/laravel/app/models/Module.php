<?php

Class Module extends Eloquent {
	protected $table = 	'modules';
	public $timestamps = false;

	/**
	 * Returns a collection of all courses that contain the module
	 */
	public function courses() {
		return $this->belongsToMany('Course')->withPivot('course_module');
	}

	/**
	 * Returns a collection of all sections in the module
	 */
	public function sections() {
		return $this->hasMany('Section')->orderBy('id');
	}

	/**
	 * Returns a collection of the all user's progress for the module
	 */
	public function progress() {
		return $this->hasManyThrough('SectionProgress', 'Section');
	}

}