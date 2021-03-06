@extends('layouts.master')

@section('head')
	@parent

	<title>Login</title>

@stop
@section('content')
	@if(Session::has('success'))
		<div class="alert alert-success">{{Session::get('success')}}</div>
	@elseif(Session::has('fail'))
		<div class="alert alert-danger">{{Session::get('fail')}}</div>
	@endif
	<div class="container">
		<h1>Login</h1>
		
		<form role="form" method="post" action={{URL::route('postLogin')}}>
			<div class="form-group{{($errors->has('username'))? 'has-error':''}}">
				<label for="username">Username</label>
				<input id="username" name="username" type="text" class="form-control">
				@if($errors->has('username'))
					{{$errors->first('username')}}
				@endif
			</div
			<div class="form-group{{($errors->has('pass1'))? 'has-error':''}}">
				<label for="pass1">Password</label>
				<input id="pass1" name="pass1" type="password" class="form-control">
				@if($errors->has('pass1'))
					{{$errors->first('pass1')}}
				@endif
			</div>
			<div class="form-group">
				<label for="checkbox">
					<input type="checkbox" name="remember" id="remember" >
					Remember me
				</label>
			</div>
			{{Form::token()}}
			<div class="form-group">
				<input  type="submit" value="Login" class="bth bth-default">
			</div>
		</form>
	</div>

@stop