<?php

class HomeController extends BaseController {

	public function getIndex() {
		if(Auth::check()) {
			return Redirect::to('modules');
		}
		return View::make('landing');
	}

	public function getHelp() {
		return "help action";
	}

	public function showHelp() {
		return 'showhelp';
	}

	public function missingMethod($parameters = array()) {
		return "Page not found";
	}

}
