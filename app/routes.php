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

/*Route::get('/', function()
{
	//return View::make('home');
	return View::make('HomeController@showHome');
});*/

Route::get('/', [ 'as' => 'home', 'uses' => 'HomeController@showHome']);

Route::get('topic/{topic_id}', [ 'as' => 'topic', 'uses' => 'TopicController@showTopic']);
Route::get('organ/{topic_id}', [ 'as' => 'organ', 'uses' => 'OrganController@showOrgan']);

Route::get('about', ['as' => 'about', function()
{
	return View::make('about');
}]);

Route::get('contact', ['as' => 'contact', function()
{
	return View::make('contact');
}]);

Route::get('test', ['as' => 'test', function()
{
	return 'hello';
}]);

/*
|--------------------------------------------------------------------------
| Admin-related routes
|--------------------------------------------------------------------------
*/

Route::get('login', ['as' => 'login', function()
{
	if (Auth::check())
    {
        return Redirect::to('admin');
    } else
    {
        return View::make('admin.login');
    }
}]);

Route::post('login', function()
{
  $rules = [
    'email'       =>  'required|email',
    'password'    =>  'required'
  ];

  $validator = Validator::make(Input::all(), $rules);

  if ($validator->fails())
  {
      return Redirect::to('login')->withInput()->withErrors($validator);
  }
  
  /* Get the login form data using the 'Input' class */
  $userdata = array(
        'email' => Input::get('email'),
        'password' => Input::get('password')
	);
 
    /* Try to authenticate the credentials */
    if(Input::get('persist') == 'on')
        $isAuth = Auth::attempt($userdata, true);
    else
        $isAuth = Auth::attempt($userdata);
 
    if($isAuth) 
    {
        // we are now logged in, go to admin
        return Redirect::to('admin');
    }
    else
    {
    	//add error to pass back
    	$messages = array(
    		'incorrect' => 'The email/password combination is incorrect.',
		);
        return Redirect::to('login')->withInput()->withErrors($messages);
    }

  return 'Form passed validation!';
});

Route::get('admin', [ 'as' => 'admin', 'before' => 'auth', function()
{
    return View::make('admin.index');
}]);

Route::get('admin/logout', [ 'as' => 'logout', function()
{
    Auth::logout();
    return Redirect::to('login');
}]);
