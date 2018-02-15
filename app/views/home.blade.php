<!DOCTYPE html>
@extends('layouts.master')

@section('title')
Home
@stop

@section('content')

<div class="col-md-offset-3">
	<div class="center-block">
		{{ HTML::image("images/logoiarc.gif", "IARC", array('class' => 'img-responsive')) }}
	</div>
</div>

@stop
