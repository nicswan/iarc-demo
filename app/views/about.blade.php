@extends('layouts.master')

@section('title')About @stop

@section('content')

	<ol class="breadcrumb">
		<li><a href="{{ URL::route('home') }}">Home</a></li>
  		<li class="active">About</li>
	</ol>
		
	<h2>About This Website</h2>
		
	<p>This is a <b>proof of concept</b> website intended to show possibilities for modernizing PubCan. It was architected 
	with long-term maintainability in mind.	It is not intended to be entirely correct, error free, or feature complete.</p>
	
	<h3>Technology</h3>
	<ul>
		<li>Linux/Unix-variant operating system</li>
		<li>Apache web server</li>
		<li>MySQL database</li>
		<li>PHP/Laravel PHP framework</li>
	</ul>
	
	<h3>Modernization and maintainability</h3>
	<ul>
		<li>Updated semantically-correct layout that separates presentation and structure</li>
		<li>Bootstrap - responsive framework
			<ul>
				<li>Single HTML/CSS/JS codebase to drive multiple views and support different devices</li>
				<li>Progressive enhancement</li>
				<li>Adaptive to future browsing needs of users</li>
			</ul>
		</li>
		<li>Laravel - PHP framework
			<ul>
				<li>Model/view/controller architecture</li>
				<li>RESTful routing</li>
			</ul>
		</li>
	</ul>

@stop
