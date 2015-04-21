<!doctype html>
<html lang="en">
<head>
	@section('head')
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	@show
</head>
<body>
	<div class="navbar">
		<div class="navbar-header">
			<button type="nacbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="{{URL::route('home')}}" class="navbar-brand">Laravel Forum Software</a>
		</div>
		<div class="navbar-collapse collapse navbar-responsive-collapse">
			<ul class="nav navbar-nav">
				<li><a href="{{URL::route('home')}}">Home</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				@if(!Auth::check())
					<li><a href="{{URL::route('getCreate')}}">Register</a></li>
					<li><a href="{{URL::route('getLogin')}}">Login</a></li>
				@else
					<li><a href="{{URL::route('getLogout')}}">Logout</a></li>
				@endif
			</ul>
		</div>
	</div>
	@yield('content')
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>
