<?php

Class SectionProgress extends Eloquent {
	protected $table = 	'section_progress';
	public $timestamps = false;

	protected $fillable = array('user_id', 'section_id');

	/**
	 * Returns the section this progress belongs to
	 */
	public function section() {
		return $this->belongsTo('Section');
	}

	/**
	 * Returns the user this progress belongs to
	 */
	public function user() {
		return $this->belongsTo('User');
	}

	/**
	 * Returns whether this is the latest section completed
	 */
	public function isLastSection() {
		return ($this->status == 2);
	}

}