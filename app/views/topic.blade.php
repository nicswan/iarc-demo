<?php
$organ = Topic::find($topic->organ_topic_id);
$item = !isset($topic->description) && !$topic->is_organ_topic ? Topic::getBranch($topic->topic_id) : null;
if ( isset($item) ) $item = $item->get(0);
//$name = $item->name;
//$url = isset($item->description) ? "/topic/".$item->topic_id : '#';
//$linkable = isset($item->description) ? true : false;
//$active = Request::is($item['url'].'/*') : false;
?>

@extends('layouts.master')

@section('title'){{ $topic->name }}@stop

@section('content')
	<ol class="breadcrumb hidden-xs">
		@if( isset($organ))<li><a href="{{ URL::route('organ', array($organ->topic_id))}}">Tumours of the {{$organ->name}}</a></li>@endif
  		<li class="active">{{$topic->name}}</li>
	</ol>
	@if( isset($item) )
		@{{ var_dump($item) }}
		@include('layouts._topicTree', $item)
	@else
		<article>
			<h2>{{$topic->name}}</h2>
			{{$topic->description}}
			
			@include('layouts._referenceInfo', $topic)
		</article>
  	@endif
@stop
