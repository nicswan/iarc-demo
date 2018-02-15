<?php
$organ = Topic::find($topic->organ_topic_id);
$branch = Topic::getBranch($topic->topic_id);
if ( isset($branch) ) $branch = $branch->get(0);
$children = $branch->children;
//$name = $item->name;
//$url = isset($item->description) ? "/topic/".$item->topic_id : '#';
//$linkable = isset($item->description) ? true : false;
//$active = Request::is($item['url'].'/*') : false;
?>

@extends('layouts.master')

@section('title'){{ $topic->name }}@stop

@section('content')

	<!--<ol class="breadcrumb">
		@if ( isset($topic->parent_topic_id) )
			@if( isset($organ))<li><a href="{{ URL::route('organ', array($organ->topic_id))}}">Tumours of the {{$organ->name}}</a></li>@endif
		@endif
  		<li class="active">{{$topic->name}}</li>
	</ol>-->
		<h2>{{$topic->name}} Tumours</h2>
		@if( isset($children) )
			@foreach($children as $item)
				@include('layouts._topicTree', $item)
			@endforeach
		@endif

	@include('layouts._referenceInfo', $topic)

@stop
