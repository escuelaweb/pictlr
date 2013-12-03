<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bienvenido a Pictlr {{Auth::user()->name}}</title>

	<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>

	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}">
	
</head>
<body class="container">
	<header>
		<div class="row">
			<h1>Pictlr - Página Principal</h1>
		</div>
	</header>
	<section class="row">
		<header>Bienvenido {{Auth::user()->name}} <a href="{{URL::to('/logout')}}">Cerrar Sesión</a></header>
	</section>
</body>
</html>