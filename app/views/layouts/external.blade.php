<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>

	@section('scripts')
	<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
	@show

	@section('stylesheets')	
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	@show	

</head>
<body>
	@yield('content')
</body>
</html>