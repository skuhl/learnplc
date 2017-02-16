<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

App::error(function($exception, $code)
{
	if(App::environment('production')) {
	    switch ($code)
	    {
	        case 403:
	            return Response::view('errors.403', array(), 403);

	        case 404:
	            return Response::view('errors.404', array(), 404);

	        case 500:
	            return Response::view('errors.500', array(), 500);

	        default:
	            return Response::view('errors.default', array(), $code);
	    }
	}
});

// App::error(function(PDOException $exception)
// {
//     Log::error("Error connecting to database: ".$exception->getMessage());

//     return $exception->getMessage();
// });

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			return Redirect::guest('account/login')->with('errorMessage', 'Sign in required to access page.');
		}
	}
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	$token = Request::ajax() ? Request::header('X-CSRF-Token') : Input::get('_token');
	if (Session::token() != $token)
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});

/*
|--------------------------------------------------------------------------
| HTTPS Redirect Filter
|--------------------------------------------------------------------------
|
| The secure filter redirects requests to use the https protocol.
| Use it to force requests over https for increased security when needed.
|
*/

Route::filter('secure', function()
{
	if(!Request::secure())
	{
		return Redirect::secure(Request::path());
	}
});

/*
|--------------------------------------------------------------------------
| Ajax Filter
|--------------------------------------------------------------------------
|
| The ajax filter checks to see if a request originates from an ajax call.
| If the request is not from an ajax call then the server throws a 500 error.
|
*/
Route::filter('ajax', function() 
{
	if (Request::ajax() === false)
	return Response::error('500');
});

