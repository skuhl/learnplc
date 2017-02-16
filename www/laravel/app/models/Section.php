<?php

Class Section extends Eloquent {
	protected $table = 'sections';
	public $timestamps = false;

	public function nextSection() {
		// $nextName = Section::find(($this->id)+1)->name;
		// $nextS = substr($nextName,-1);
		// $nextM = Section::find(($this->id)+1)->module_id;

		// return 'm'.$nextM.'s'.$nextS;
		return $this->belongsTo('Section', 'next_section_id');
	}

	/**
	 * Returns the module that contains the section
	 */
	public function module() {
		return $this->belongsTo('Module');
	}

	/**
	 * Returns a collection of all user's progress for the section
	 */
	public function progress() {
		return $this->hasMany('SectionProgress');
	}

	/**
	 * Returns the path of the view that will be rendered.
	 */
	public function view() {
		return $this->view;
	}
	
}