<?php

Class CourseRole extends Eloquent {
	protected $table = 	'course_roles';
	public $timestamps = false;

	/**
	 * Returns a collection of all users with this role
	 */
	public function users() {
		return $this->belongsToMany('User', 'course_user')->withPivot('course_role');
	}

}