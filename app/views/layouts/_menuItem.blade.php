<?php
//var_dump($item->get(0));
//exit();
//var_dump($item->topic_id);
$items = Topic::getOrganBranch($item->topic_id);
//var_dump($items);
$items = ($items->count() > 0) ? $items : false;
//var_dump($items);
//exit();
$name = $item->name;
$tid = $item->topic_id;
//$url = isset($item->description) ? "/topic/".$item->topic_id : '#';
//$linkable = isset($item->description) ? true : false;
//$active = Request::is($item['url'].'/*') : false;
?>

@if ( !$items )
  	<li>
		<a href="{{ URL::route('organ', array($tid))}}">{{$name}}</a>
	</li>
@else
<li>
	<a class="accordion-heading" data-toggle="collapse" data-target="#submenu{{$item->topic_id}}">
      	<span class="nav-header-primary">{{$name}} <b class="caret"></b></span>
	</a>
    <ul style="margin-left: 5%;" class="nav nav-list collapse" id="submenu{{$item->topic_id}}">
    	@foreach ($items as $item)
        	@include('layouts._menuItem', array('item' => $item))
        @endforeach
    </ul>
</li>
@endif
