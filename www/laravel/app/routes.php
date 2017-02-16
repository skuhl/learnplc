<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Redirects root to:
// Home if logged in
// Landing page if not logged in
Route::any('/', function() {
	return Redirect::to('home');
});

Route::get('about', function() {
	return View::make('pages.about');
});

Route::get('contact', function() {
	return View::make('pages.contact');
});

Route::get('modules/{module}/{section}', 'ModuleController@getContent');	


/*
|--------------------------------------------------------------------------
| Controller Routes
|--------------------------------------------------------------------------
| Register all controller routes here.
| Routes registered here should follow the REST naming convention.
|
| Register routes with Route::controller('{controller}', '{class}') 
| where {controller} is the base uri the controller handles and {class} 
| is the name of the controller class.
|
| Use /{controller} to direct traffic to the Index() method of the controller.
|
| Use URIs of the form /{controller}/{method} to sent requests to specific 
| methods in each controller.
|
| You can also pass in a single paramater to a controller method that may require 
| one by constructing URIs of the form /{controller}/{method}/{param}.
|
| Ex: /user/profile/1 will direct traffic to the profile method of the 
| user controller and pass in '1' as a parameter.
|
*/

Route::controller('home', 'HomeController');
Route::controller('account', 'AccountController');
Route::controller('user', 'UserController');
Route::controller('courses', 'CourseController');
Route::controller('modules', 'ModuleController');

/*
|--------------------------------------------------------------------------
| Testing Routes
|--------------------------------------------------------------------------
|
| Register testing and example routes here.
| These need to be remove before an application is released to production.
|
*/

Route::controller('test', 'TestController');

