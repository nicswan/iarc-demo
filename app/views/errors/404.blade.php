@extends('layouts.master')

@section('title')404 not found @stop

@section('content')

	<ol class="breadcrumb">
		<li><a href="/">Home</a></li>
  		<li class="active">404 Not Found</li>
	</ol>
		
	<h2>Page Not Found</h2>
		
	<p>Oops. The page you're looking for couldn't be found. Likely it's because it hasn't been built. 
	<a href="/about">Visit the About page</a> to learn more about this proof of concept website.
	</p>

@stop
