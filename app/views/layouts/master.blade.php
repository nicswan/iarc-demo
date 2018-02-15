<?php
$organs = Topic::getTopLevel();
//var_dump($organs);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - PubCan(POC) - International Agency for Research on Cancer</title>

    <!-- Referencing Bootstrap CSS that is hosted locally -->
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/bootstrap-theme.min.css') }}
  </head>

  <body>

	<!-- Fixed navbar -->
      <nav class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            
            <a class="navbar-brand" href="/"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> PubCan<small>(POC)</small></a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <!--<li class="active"><a href="/">Home</a></li>-->
              	@if( Request::is('organ/*') )<li class="dropdown active">
              	@else <li class="dropdown">
              	@endif                
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Organ Sites <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                	@foreach($organs as $organ)
                		<li><a href="{{ URL::route('organ', array($organ->topic_id))}}">{{$organ->name}}</a></li>
                	@endforeach
                </ul>
              </li>
              @if(Request::is('about'))<li class="active">
              @else <li>
              @endif
              {{ HTML::linkRoute('about', 'About')}}</li>
              @if(Request::is('contact'))<li class="active">
              @else <li>
              @endif
              {{ HTML::linkRoute('contact', 'Contact')}}</li>

            </ul>
                      <form class="navbar-form navbar-right" role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
		  	</div>
  			<button type="submit" class="btn btn-default">Submit</button>
			</form>
          </div><!--/.nav-collapse -->
          
        </div>
      </nav>
    
    <div class="container">
      <div class="row">
        <h1>WHO Classification of Tumours</h1>
    	<div class="col-md-4">
      		@include('layouts._menu')
        </div>
      	<div class="col-md-8">
        	@yield('content')
        	
        </div>
      </div>
      
      <hr>

	  <footer>
    	<p class="text-right">
    	A demo for the International Agency for Research on Cancer | {{ HTML::linkRoute('login', 'Log in')}}
    	</p>
      </footer>
    </div>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>

    <!-- Referencing Bootstrap JS that is hosted locally -->
    {{ HTML::script('js/bootstrap.min.js') }}
  </body>
</html>