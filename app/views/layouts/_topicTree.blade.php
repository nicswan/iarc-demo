<?php
//var_dump($item->get(0));
//exit();
$items = isset($item->children) ? $item->children : false;
$name = $item->name;
if ( isset($item->icdo_code) ) $name = $item->icdo_code.' '.$name;
$url = isset($item->description) ? URL::route('topic', array($item->topic_id)) : '#';
$linkable = isset($item->description) ? true : false;
//$active = Request::is($item['url'].'/*') : false;
?>


<li>
	@if($linkable)<a href="{{$url}}">{{ $name }}</a>@else {{$name}}@endif
    @if ($items)
        <ul>
             @foreach ($items as $item)
               @include('layouts._topicTree', array('item' => $item))
             @endforeach
          </ul>
       @endif
</li>