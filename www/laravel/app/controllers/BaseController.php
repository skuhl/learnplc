<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	/* Handles filters that apply to all controllers --- Not working
	 */
	public function __construct() {
		//$this->beforeFilter('auth');
		$this->beforeFilter('csrf', array('on' => 'post'));
	}

	/* Handles requests to controller routes that do not exist.
	 */
	public function missingMethod($parameters = array()) {
		return App::abort(404);
	}
}
