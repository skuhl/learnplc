<?php

class TestController extends BaseController {
	protected $layout = "layout.master";


	public function __construct() {
		$this->beforeFilter('auth', array('except' => 'getLogin'));
		$this->beforeFilter('csrf', array('on' => 'post'));
		$this->beforeFilter('secure', array('only' => array('getHttps', 'postHttps')));
	}

	public function getFooter() {
		$myCourse = Course::whereHas('users', function($query) {
			$query->where('course_role', '0')->where('user_id',7);
		})->first();

		if ($myCourse == null) {
			return 'null';
		}
		return $myCourse;
	}
	// template testing
	public function getTemplate() {
		return View::make('module.template');
	}
	public function getTemplatetest() {
		return View::make('module.mod1.section1');
	}

	public function getIndex() {
		// return "Test Controller";
		return View::make('test.errortest')->with('error','error variable');
	}

	public function postRedi() {
		// return Redirect::back()->with('error2','redirected back');
		return Redirect::to('test')->with('error2','redirected back');
		// return View::make('test.errortest')->with('error2', 'erro2');

	}

	public function getUser() {
		$user = new User;
		$user->email = 'laravel@plc.com';
		$user->password = Hash::make('password');
		$user->save();
		return $user;
	}

	public function getDB() {
		if(DB::connection()->getDatabaseName()) {
			return "connected sucessfully to database ".DB::connection()->getDatabaseName();
		}
		else {
			return "Unable to connect to database";
		}
	}

	/* Uncomment the 'secure' filter and go to /test/https
	 * to test the https redirect filter.
	 */
	public function getHttps() {
		return "Connected through https";
	}

	/* Go to /test/params/{param1}/{param2} to test
	 * passing in multiply parameters for a method
	 */
	public function getParams($param1, $param2) {
		echo "Param1: ".$param1; echo "<br>";
		echo "Param2: ".$param2;
		return;
	}

	public function getRegister() {
		return $this->layout->content = View::make('test.register');
	}

	public function postRegister() {
		$validator = Validator::make(Input::all(), User::$rules);

		if ($validator->passes()) {
			return Input::get("email")." registered!";
		} else {
			return Redirect::to('test/register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}
	}

	public function getCrypt() {
		$hash = Hash::make('secret');
		echo 'Hash: '.$hash; echo '<br>';

		$bool = Hash::check('secret', '$2y$10$lyCxCcMpmFjl.gvNeTvkhuPnFV5eV6lcOlzdBtdqg.jXp1eiy7Czy');
		echo 'Password = hash? '.$bool; echo '<br>';

		$rehash = Hash::needsRehash($hash);
		echo 'Needs rehash? '.$rehash; echo '<br>';

		$token =  openssl_random_pseudo_bytes(6, $cstrong);

		echo "token: ".bin2hex($token)." cstrong: ".$cstrong.'<br>';
		echo "uniqid(): ".uniqid().'<br><br>';

		$course = new Course();

		echo "Course: ".$course->id." token: ".uniqid($course->id);

	}

	public function getCourses() {
		$id = 2;
		$course = Course::find($id);
		$modules = $course->modules;
		$students;

		// Query gets progress information for each student in the course
		// $data = $course->modules()->with(array('progress.section' => function($query) use($course) {
		// 	$query->where('course_id', '=', $course->id)->orderBy('user_id')->with('user');
		// }))->get();

		$data = $course->students()->with('progress.section')->get();

		
		foreach($data as $s) {
			foreach($s->progress as $p) {
				if(isset($students[$s->id][$p->section->module_id])) {
					$students[$s->id]['modules'][$p->section->module_id] += $p->completed;
				}
				else {
					$students[$s->id]['user'] = $s;
					$students[$s->id]['modules'][$p->section->module_id] = $p->completed;
				}
			}
		}

		// // Processes and organizes information so that it can be used by the view
		// foreach($data as $m) {
		// 	foreach($m->progress as $p) {
		// 		if(isset($students[$p->user_id]['modules'][$p->module_id])) {
		// 			$students[$p->user_id]['modules'][$p->module_id] += $p->completed;
		// 		}
		// 		else {
		// 			$students[$p->user_id]['user'] = $p->user;
		// 			$students[$p->user_id]['modules'][$p->module_id] = $p->completed;
		// 		}
		// 	}
		// }

		//return View::make('test.courses')->with('modules',$modules)->with('students', $students);

		foreach($students as $student) {
			//echo var_dump($student['user']);
			echo 'student: '. $student['user']->email.' module: ';
			foreach($student['modules'] as $module) {
				echo $module.' ';
			}
			echo '<br>';
		}
	}

	public function getProgress() {
		$c = Course::find(1)->first();
		$course = array();
		$courses[$c->id]['course'] = $c;
		$courses[$c->id]['totalSections'] = 0;
		foreach($c->modules as $m) {
			$courses[$c->id]['totalSections'] += $m->sections->count();
		}
		
		echo $courses[$c->id]['totalSections'].'<br>';
		


	}

	public function getLastLogin($id) {
		if(isset($id)) {
			$date = time();
			$user = User::find($id);
			$user->last_login_at = new DateTime();
			echo date("D M j", $user->last_login_at->getTimestamp()).' at '.date("g:ha", $user->last_login_at->getTimeStamp());
		}
		else {
			$user = Auth::user();
			$user->last_login_at = new DateTime();
			$user->save();
		}
	}

	public function getContent($mod, $sec) {

		// get the name of the next section for submit redirect
		$module = Module::where('url_name', $mod)->first();
		if(!$module) App::abort(404);
		$section = $module->sections()->where('url_name', $sec)->first();
		if(!$section) App::abort(404);
		$nextSection = $section->nextSection;

		// get list of completed sections
		$completedSections = User::find(Auth::id())->completedSections($module->id);


		return View::make($section->view())
		->withSections($completedSections)
		->withMod($module)
		->withSec($section)
		->withNext($nextSection);
	}

	public function getHost() {
		return "Environment: ". App::environment() .'   '."Host: ". gethostname();
	}

	public function getSection($id) {
		//
		$section = Section::find($id);
		$nextSection = $section->nSection;

		echo $section.'<br>';

		if($nextSection) {
			echo $nextSection.'<br>';
		}
		else {
			echo "no next section";
		}
		

	}

	public function getMail() {
		Mail::send('emails.confirm', $data, function($message)
		{
			$message->to('keaganr@gmail.com', 'Keagan Rasmussen')->subject('Confirm Email Address');
		});
		return 'sent email';
	}

	public function getModtest() {
		$user = User::find(Auth::id());
		return $user->completedSections(1);
	}

}
