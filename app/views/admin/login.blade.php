@extends('layouts.master')

@section('title') Log in @stop

@section('content')

<div class="row centered-form">
  <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-2">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Log in</h3>
      </div>
      <div class="panel-body">
      
      	@if(Session::get('errors'))
  			<div class="alert alert-danger alert-dismissable">
    			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			    <!--<h5>There were errors during login:</h5>-->
				@foreach($errors->all('<li>:message</li>') as $message)
				    {{$message}}
				@endforeach
			  </div>
		@endif
		
        {{ Form::open() }}

          <div class="form-group">
            {{ Form::email('email', Input::get('email'), array('class'=>'form-control input-sm','placeholder'=>'jane@janedoe.com')) }}
          </div>
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                {{ Form::password('password', array('class'=>'form-control input-sm','placeholder'=>'password')) }}
              </div>
            </div>
          </div>

          {{ Form::submit('Login', array('class'=>'btn btn-info btn-block')) }}

        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>

@stop