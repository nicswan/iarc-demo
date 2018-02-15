<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	
	public $layout = 'layouts.master';
  
  	public function showHome()
  	{
    	$this->layout->title = 'Home';
    	$this->layout->content = 'Test';
    	
    	$items = Topic::getTree();
    	//$items = Tree::all();
		//var_dump($items->all());
        $this->layout->content = View::make('home')->withItems($items);
        //return $items;
	}

	public function showWelcome()
	{
		return View::make('hello');
	}

}