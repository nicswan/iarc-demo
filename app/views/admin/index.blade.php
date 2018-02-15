<?php
if( isset(Auth::user()->first_name) ) $fname = Auth::user()->first_name;
else $fname = null;
$organs = Topic::getTopLevel();
$users = User::all();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PubCan(POC) Administrative Dashboard</title>

    <!-- Bootstrap Core CSS -->
    {{ HTML::style('css/bootstrap.min.css') }}

    <!-- MetisMenu CSS -->
    {{ HTML::style('dist/metisMenu/dist/metisMenu.min.css') }}

    <!-- Timeline CSS -->
    {{ HTML::style('dist/css/timeline.css') }}

    <!-- Custom CSS -->
    {{ HTML::style('dist/css/sb-admin-2.css') }}

    <!-- Custom Fonts -->
    {{ HTML::style('dist/font-awesome/css/font-awesome.min.css') }}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ URL::route('admin') }}">PubCan<small>(POC)</small> Administration</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
            	@if( isset($fname) )Welcome, {{$fname}}.@endif
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ URL::route('logout')}}"><i class="fa fa-sign-out fa-fw"></i> Log out</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="{{ URL::route('admin') }}?home"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
						<li>
                            <a href="#"><i class="fa fa-heart-o fa-fw"></i> Organ sites<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Add organ site</a>
                                </li>
                                <li>
                                    <a href="#">Edit organ site</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-medkit fa-fw"></i> Tumours/syndromes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Add tumour/syndrome</a>
                                </li>
                                <li>
                                    <a href="#">Edit tumour/syndrome</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Users<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="test">Add user</a>
                                </li>
                                <li>
                                    <a href="test">Edit user</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Import data</a>
                        </li>
                        <li>
                            <a href="{{ URL::route('home')}}" target="_blank"><i class="fa fa-external-link fa-fw"></i> View website</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

<div class="row">
             	<div class="col-lg-6">
                	<div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-heart-o fa-fw"></i> Organ sites
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
								<table class="table table-striped">
								  <tbody>
							  		@if( $organs->count() > 0 )
								  		@foreach($organs as $organ)
							  			<tr>
				  							<td><a href="#"><i class="fa fa-pencil-square-o fa-fw"></i></a>
				  							<td>{{$organ->name}}</td>
							  				<td></td>
							  				<td></td>
				  							<td></td>
							  			</tr>
										@endforeach
									@endif
								  </tbody>
								</table>
			  				</div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
				<div class="col-lg-6">
                	<div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-users fa-fw"></i> Users
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
								<table class="table table-striped">
								  <tbody>
							  		@if( $users->count() > 0 )
								  		@foreach($users as $u)
							  			<tr>
				  							<td><a href="#"><i class="fa fa-pencil-square-o fa-fw"></i></a>
				  							<td>{{$u->email}}</td>
							  				<td>{{$u->first_name}}</td>
							  				<td>{{$u->last_name}}</td>
				  							<td></td>
							  			</tr>
										@endforeach
									@endif
								  </tbody>
								</table>
			  				</div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>

    <!-- Referencing Bootstrap JS that is hosted locally -->
    {{ HTML::script('js/bootstrap.min.js') }}

    <!-- Metis Menu Plugin JavaScript -->
    {{ HTML::script('dist/metisMenu/dist/metisMenu.min.js') }}

    <!-- Morris Charts JavaScript -->
    <!-- @{{ HTML::script('dist/raphael/raphael-min.js') }}
    @{{ HTML::script('dist/morrisjs/morris.min.js') }}
    @{{ HTML::script('dist/js/morris-data.js') }} -->


    <!-- Custom Theme JavaScript -->
    {{ HTML::script('dist/js/sb-admin-2.js') }}

</body>

</html>
