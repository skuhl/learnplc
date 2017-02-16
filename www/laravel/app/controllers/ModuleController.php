<?php

class ModuleController extends \BaseController {

	/**
	* Constructor handles authentication check
	*/
	public function __construct() {
		$this->beforeFilter('auth', array('except' => array('getLogin', 'postLogin')));
		$this->beforeFilter('csrf', array('on' => 'post'));
	}

	/**
	 * Display module homepage
	 */
	public function getIndex()
	{

		$user = User::find(Auth::id());
		$sectionProgress = SectionProgress::where('user_id',7)->get();
		$enabledModules = $user->enabledModules();
		$lastVisited = SectionProgress::where('user_id', $user->id)->where('last_visited', 1)->first();

		// include an optional tag variable to display label
		$optionShow = 0;
		$enabledModules[0] = 1; // there is no module 0
		foreach ($enabledModules as $mod) {
			if ($mod == 0) {
				$optionShow = 1;
			}
		}
    		
		return View::make('module.index')
		->withModuleprogress($user->moduleProgress())
		->withEnabled($enabledModules)
		->withOptional($optionShow)
		->withLast($lastVisited);
    }

	/**
	* Navigate to a specific module
	*/
	public function getContent($mod, $sec) {
		$user = Auth::user();

		// get the name of the next section for submit redirect
		$module = Module::where('url_name', $mod)->first();
		if(!$module) App::abort(404);
		$section = $module->sections()->where('url_name', $sec)->first();
		if(!$section) App::abort(404);
		$nextSection = $section->nextSection;

		$lastVisited = SectionProgress::where('user_id', $user->id)->where('last_visited', 1)->first();
		if($lastVisited) {
			$lastVisited->last_visited = 0;
			$lastVisited->save();
		}

		$progress = SectionProgress::firstOrNew(['section_id' => $section->id, 'user_id' => $user->id]);
		$progress->last_visited = 1;
		$progress->save();
		
		// get list of completed sections
		$completedSections = User::find(Auth::id())->completedSections($module->id);

		return View::make($section->view())
		->withSections($completedSections)
		->withMod($module)
		->withSec($section)
		->withNext($nextSection)
		->withSubmitstatus($completedSections[$section->id]);
	}

	/**
	 *
	 */
	public function postSubmit($sec) {
		$user = Auth::user();

		$lastCompleted = SectionProgress::where('user_id', $user->id)->where('status', 2)->first();
		if($lastCompleted) {
			$lastCompleted->status = 1;
			$lastCompleted->save();
		}

		$section = Section::find($sec);
		$progress = SectionProgress::firstOrNew(['section_id' => $section->id, 'user_id' => $user->id]);
		$progress->status = 2;
		$progress->correct = 1;

		$questions = Input::get('question');
		$answers = Input::get('crypt');
		$results = array();

		if($questions) {
			foreach($questions as $key => $val) {
				if(isset($answers[$key])) {
					$answer = preg_replace('/\s+/', '', strtolower(substr(Crypt::decrypt($answers[$key]),0,-13)));
					$submit = preg_replace('/\s+/', '', strtolower($val));
					if($answer == $submit ) {
						$results[] =  array($key, "success", "success");
					}
					else {
						$results[] = array($key, "danger", "error");
						$progress->correct = 0;
					}
				}
			}
		}

		$progress->save();

		return Response::json($results);
	}
	
}