<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pictlr</title>

	<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>

	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}">
</head>
<body class="container">
	<header>
		<div class="row">
			<h1>Bienvenido a Pictlr</h1>
		</div>
		<div class="row">
			<h2>Social Pics!!</h2>
		</div>
	</header>

	<section id="main">
		<footer class="row">
			<a href="{{URL::to('login')}}" class="btn btn-primary">Inicia Sesión</a>
			<a href="#" class="btn btn-success">Regístrate</a>
		</footer>
	</section>

</body>
</html>