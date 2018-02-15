<?php
//var_dump($item->get(0));
//exit();
$items = Topic::getTopLevel();
//$items = Topic::getOrganBranch($organ->topic_id);
//var_dump($items);
?>
<nav class="navbar navbar-default hidden-xs">
	<ul class="sidebar nav nav-list">
    	@foreach ($items as $item)
       		@include('layouts._menuItem', $item)
	    @endforeach
	</ul>
</nav>
